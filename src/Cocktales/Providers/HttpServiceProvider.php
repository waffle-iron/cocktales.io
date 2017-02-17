<?php

namespace Cocktales\Providers;


use Illuminate\Support\ServiceProvider;

class HttpServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Cocktales\Http\ResponseFactory', 'Cocktales\Http\LaravelResponseFactory');
    }
}