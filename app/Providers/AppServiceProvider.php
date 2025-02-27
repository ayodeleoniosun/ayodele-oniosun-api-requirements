<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $migrationPath = app_path('Domain/*/Database/Migrations');
        $directories = glob($migrationPath.'/*', GLOB_ONLYDIR);
        $paths = array_merge([$migrationPath], $directories);
        $this->loadMigrationsFrom($paths);
    }
}
