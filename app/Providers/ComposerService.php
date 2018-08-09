<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerService extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', 'App\Http\ViewComposers\CategoryComposer');
        view()->composer('*', 'App\Http\ViewComposers\ProductsInCartComposer');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
