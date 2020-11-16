<?php

namespace Bastiyan\EventMate;

use Illuminate\Support\ServiceProvider;

class EventMateServiceProvider extends ServiceProvider
{

    public function register()
    {
        
    }

    public function boot()
    {
    
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'eventmate');

        if( $this->app->runningInConsole()){
            //Publish Views

            $this->publishes([
                __DIR__.'/resources/views' => resource_path('views/vendor/eventmate'),
            ], 'views');
        }

    }

}