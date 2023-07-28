<?php

namespace App\Providers;

use App\CustomFacade;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class CustomFacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('customfacade', function(){
            return new CustomFacade();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

