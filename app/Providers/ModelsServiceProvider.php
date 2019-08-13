<?php

use Illuminate\Support\ServiceProvider;

class ModelsServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->bind(
                'IFaculty', 'Faculty'
        );
    }

}
