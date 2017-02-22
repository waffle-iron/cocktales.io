<?php

namespace Cocktales\Framework\Providers;

use Cocktales\Domain\Profile\Repository;
use Cocktales\Domain\Profile\Repository\IlluminateDbRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Repository::class, IlluminateDbRepository::class);
    }
}