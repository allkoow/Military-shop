<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['parts.menu','adminpanel.categories.index'],
                          'App\Http\ViewComposers\MenuComposer');

        view()->composer(['parts.cart', 'cart.index'],
                          'App\Http\ViewComposers\CartComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
