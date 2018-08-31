<?php

namespace App\Services;

use App\Category;
use App\Chain;
use App\ChainManager;
use App\Difficulty;
use App\LearningActivityProducing;
use App\ResourceMaterial;
use App\ResourcePerson;
use App\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LAPFactory
{
    /**
     * @var ChainManager
     */
    private $chainManager;
    private $data;

    public function __construct(ChainManager $chainManager)
    {
        $this->chainManager = $chainManager;
    }

    public function createLAP(array $data): LearningActivityProducing
    {
        $this->data = $data;
        if ('new' === $data['resource']) {
            $data['resource'] = 'other';
        }

        $category = $this->getCategory($data['category_id']);

        $learningActivityProducing = new LearningActivityProducing();
        $learningActivityProducing->wplp_id = Auth::user()->getCurrentWorkplaceLearningPeriod()->wplp_id;
        $learningActivityProducing->description = $data['omschrijving'];
        $learningActivityProducing->duration = 'x' !== $data['aantaluren'] ?
            $data['aantaluren'] :
            round(((int) $data['aantaluren_custom']) / 60, 2);

        $learningActivityProducing->category()->associate($category);
        $learningActivityProducing->difficulty()->associate(Difficulty::findOrFail($data['moeilijkheid']));
        $learningActivityProducing->status()->associate(Status::findOrFail($data['status']));

        if (-1 !== ((int) $data['chain_id'])) {
            $chain = (new Chain())->find($data['chain_id']);
            $learningActivityProducing->chain()->associate($chain);
        }

        $learningActivityProducing->date = (new Carbon($data['datum']))->format('Y-m-d');

        // Attach the resource used
        switch ($data['resource']) {
            case 'persoon':
                $learningActivityProducing->resourcePerson()->associate($this->getResourcePerson());
                break;
            case 'internet':
                $learningActivityProducing->resourceMaterial()->associate(ResourceMaterial::findOrFail(1));
                $learningActivityProducing->res_material_detail = $data['internetsource'];
                break;
            case 'boek':
                $learningActivityProducing->resourceMaterial()->associate(ResourceMaterial::findOrFail(2));
                $learningActivityProducing->res_material_detail = $data['booksource'];
                break;
        }

        $learningActivityProducing->save();

        return $learningActivityProducing;
    }

    private function getCategory($id): Category
    {
        if ('new' === $id) {
            $categoryFactory = new CategoryFactory();

            return $categoryFactory->createCategory($this->data['newcat']);
        }

        return (new Category())->find($id);
    }

    private function getResourcePerson(): ResourcePerson
    {
        if ('new' === $this->data['personsource'] && 'persoon' === $this->data['resource']) {
            $factory = new ResourcePersonFactory();

            return $factory->createResourcePerson($this->data['newswv']);
        }

        return (new ResourcePerson())->find($this->data['personsource']);
    }
}
