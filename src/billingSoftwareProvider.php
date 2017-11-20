<?php

namespace arman\billing_software;

use Illuminate\Support\ServiceProvider;

class billingSoftwareProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // register our controller
        $this->app->make('arman\billing_software\billingSoftwareController');
        $this->loadViewsFrom(__DIR__.'/views', 'calculator');
    }
}
