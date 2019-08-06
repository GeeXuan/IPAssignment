<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class ProgrammeModelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Programme::observe(\App\Observer\ProgrammeObserver::class);
    }
}
