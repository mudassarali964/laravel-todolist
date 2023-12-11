<?php

namespace Mudassarali964\Todolist;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/todolist.php';
        $migrationPath = __DIR__ . '/../database/migrations';
        $routePath = __DIR__ . '/../routes';
        $viewPath = __DIR__ . '/../resources/views';

        $this->loadRoutesFrom($routePath.'/web.php');
        $this->loadMigrationsFrom($migrationPath);
        $this->loadViewsFrom($viewPath, 'todolist');

        $this->publishes([$configPath => $this->getConfigPath()], 'config');
        $this->publishes([
            $viewPath => resource_path('views/vendor/todolist'),
        ],'views');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        $configPath = __DIR__ . '/../config/debugbar.php';
//        $this->mergeConfigFrom($configPath, 'debugbar');

        $this->app->make('Mudassarali964\Todolist\Controllers\TaskController');
    }

    /**
     * Get the active router.
     *
     * @return Router
     */
    protected function getRouter()
    {
        return $this->app['router'];
    }

    /**
     * Get the config path
     *
     * @return string
     */
    protected function getConfigPath()
    {
        return config_path('todolist.php');
    }

    /**
     * Publish the config file
     *
     * @param  string $configPath
     */
    protected function publishConfig($configPath)
    {
        $this->publishes([$configPath => config_path('todolist.php')], 'config');
    }

    /**
     * Register the Debugbar Middleware
     *
     * @param  string $middleware
     */
    protected function registerMiddleware($middleware)
    {
        $kernel = $this->app[Kernel::class];
        $kernel->pushMiddleware($middleware);
    }
}
