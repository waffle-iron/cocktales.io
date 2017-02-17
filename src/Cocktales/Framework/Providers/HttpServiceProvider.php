<?php

namespace Cocktales\Framework\Providers;


use Illuminate\Support\ServiceProvider;

class HttpServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Cocktales\Application\Http\ResponseFactory', 'Cocktales\Application\Http\LaravelResponseFactory');
    }
}