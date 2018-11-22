<?php
/**
 * This file (ActingAnalysisController.php) was created on 08/31/2016 at 14:15.
 * (C) Max Cassee
 * This project was commissioned by HU University of Applied Sciences.
 */

namespace App\Http\Controllers;

use App\Analysis\Acting\ActingAnalysis;
use App\Analysis\Acting\ActingAnalysisCollector;
use App\Cohort;
use App\Repository\LikeRepositoryInterface;
use App\Repository\StudentTipViewRepositoryInterface;
use App\Student;
use App\Tips\EvaluatedTipInterface;
use App\Tips\Services\ApplicableTipFetcher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class ActingAnalysisController extends Controller
{
    public function showChoiceScreen(Student $student)
    {
        // Check if for the workplace the user has hours registered
        if (!$student->getCurrentWorkplaceLearningPeriod()->hasLoggedHours()) {
            return redirect()->route('home-acting')->withErrors([Lang::get('notifications.generic.nointernshipregisteredactivities')]);
        }

        return view('pages.acting.analysis.choice');
    }

    /**
     * @param $year
     * @param $month
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function showDetail(
        Request $request,
        $year,
        $month,
        ApplicableTipFetcher $applicableTipFetcher,
        LikeRepositoryInterface $likeRepository,
        StudentTipViewRepositoryInterface $studentTipViewRepository
    ) {
        if (Auth::user()->getCurrentWorkplaceLearningPeriod()->getLastActivity(1)->count() === 0) {
            return redirect()->route('home-acting')
                ->withErrors([Lang::get('analysis.no-activity')]);
        }

        // Check valid date options
        if (($year !== 'all' && $month !== 'all')
            && (!preg_match('/^(20)(\d{2})$/', $year) || !preg_match('/^([0-1]{1}\d{1})$/', $month))
        ) {
            return redirect()->route('analysis-acting-choice');
        }

        // The analysis for the charts etc.
        $analysis = new ActingAnalysis(new ActingAnalysisCollector($year, $month));

        if ($year === 'all' || $month === 'all') {
            $year = null;
            $month = null;
        }

        $workplaceLearningPeriod = $request->user()->getCurrentWorkplaceLearningPeriod();

        /** @var Cohort $cohort */
        $cohort = $workplaceLearningPeriod->cohort;

        $applicableEvaluatedTips = collect($applicableTipFetcher->fetchForCohort($cohort));
        // Load likes for each tip and check if it should be shown to user
        /** @var Student $student */
        $student = $request->user();
        $evaluatedTips = $applicableEvaluatedTips->filter(function (EvaluatedTipInterface $evaluatedTip) use (
            $student,
            $likeRepository
        ) {
            $likeRepository->loadForTipByStudent($evaluatedTip->getTip(), $student);

            // If not liked by this student yet, allow it to be shown
            if ($evaluatedTip->getTip()->likes->count() === 0) {
                return true;
            }

            // If liked, allow, if disliked filter it out
            return $evaluatedTip->getTip()->likes[0]->type === 1;
        })->shuffle()->take(3);

        // Register that the tip will be viewed by the student
        $evaluatedTips->each(function (EvaluatedTipInterface $evaluatedTip) use ($student, $studentTipViewRepository): void {
            $studentTipViewRepository->createForTip($evaluatedTip->getTip(), $student);
        });

        return view('pages.acting.analysis.detail')
            ->with('evaluatedTips', $evaluatedTips)
            ->with('actingAnalysis', $analysis);
    }
}
