<?php

namespace Cocktales\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * @var \Cocktales\Application\Http\ResponseFactory
     */
    protected $responseFactory;

    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Opia\Application\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        //
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->responseFactory = $this->app->make('Cocktales\Application\Http\ResponseFactory');

        // Group controllers into the right namespace
        $router->group(['namespace' => $this->namespace], function (Router $router) {

            $this->mapApiRoutes($router);

            $this->mapAppRoutes($router);

            $this->mapPublicRoutes($router);
        });
    }

    private function mapAppRoutes(Router $router)
    {
        // Map normal ui routes
        $router->group(['middleware' => 'web'], function (Router $router) {
            // Default
            $router->any('/', function () {
                return $this->responseFactory->makeViewResponse('http.layouts.welcome');
            });
        });
    }

    /**
     * @param $class
     * @param $method
     * @param array $params
     * @return \Closure
     */
    private function lazyCall($class, $method, $params = [])
    {
        return function () use ($class, $method, $params) {
            return $this->app->call($class . '@' . $method, $params);
        };
    }

    /**     * @param Router $router
     */
    private function mapApiRoutes(Router $router)
    {
    }

    private function mapPublicRoutes(Router $router)
    {
    }
}
