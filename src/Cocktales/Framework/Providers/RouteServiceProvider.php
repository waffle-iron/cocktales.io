<?php

namespace Cocktales\Framework\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    protected $namespace = 'Cocktales\Application\Http\Controllers';

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

            $this->mapAuthRoutes($router);
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

            // Home page once logged in
            $router->get('/home', function () {
               return $this->responseFactory->makeViewResponse('http.home');
            });

            // Profile
            $router->get('/profile/create', 'ProfileController@create');
            $router->get('/profile/{user_id}/show', function ($user_id) {
                return $this->app->call('Cocktales\Application\Http\Controllers\ProfileController@show', ['user_id' => $user_id]);
            });
            $router->post('/profile/create', 'ProfileController@store');
//            $router->get('/profile/{user_id}/create', function ($user_id) {
//                return $this->app->call(ProfileController::class . "@create", ['user_id' => $user_id]);
//            });
        });
    }

    private function mapAuthRoutes(Router $router)
    {
        Route::group(['middleware' => 'web',], function ($router) {
            Auth::routes();
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
