<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CourseModelServiceProvider extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        \App\Course::observe(\App\Observer\CourseObserver::class);
    }

}
