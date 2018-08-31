<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Application specific validation rules
        Validator::extend('postalcode', 'App\Validators\PostalValidator@validate');
        Validator::extend('dateInWplp', 'App\Validators\DateInLearningPeriodValidator@validate');
        Validator::extend('canChain', 'App\Validators\ChainValidator@validate');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
