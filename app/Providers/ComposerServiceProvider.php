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
        view()->composer(['parts.nav','adminpanel.categories.index'],
                          'App\Http\ViewComposers\MenuComposer');

        view()->composer(['layout', 'cart.index'],
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
