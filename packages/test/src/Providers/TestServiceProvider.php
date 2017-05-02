<?php

namespace Packages\test\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\test\Http\Controllers\Controller;
class TestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'testTranslator');
        if (app()->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

            $this->publishes([__DIR__ . '/../../resources/views' => resource_path('views/vendor/testClone')], 'pluginViews');
            $this->publishes([__DIR__ . '/../../resources/lang' => resource_path('lang/vendor/test')], 'pluginLang');
            $this->publishes([
                __DIR__ . '/../../resources/assets' => public_path('vendor/test/packages'),
//                __DIR__ . '/../../resources/assets' => resource_path('assets/test'),
//                __DIR__ . '/../../resources/assets' => public_path('vendor/test'),
            ], 'assets');
//            $this->publishes([__DIR__ . '/../../config/cms.php' => config_path('cms.php')], 'config');
        }

        $this->app->make(Controller::class);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'pluginViews');
        $this->publishes([__DIR__ . '/../../resources/views' => resource_path('views/vendor/plugin')], 'pluginViews');
        $this->publishes([__DIR__ . '/../../resources/lang' => resource_path('lang/vendor/plugin')], 'pluginLang');

//      include '../web/routes.php';
//        $this->app->make('Shift\amrTest\TestController');
    }
}
