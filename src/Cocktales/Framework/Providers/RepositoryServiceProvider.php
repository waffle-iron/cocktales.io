<?php

namespace Cocktales\Framework\Providers;

use Cocktales\Domain\Profile\InternalElements\Repository;
use Cocktales\Domain\Profile\InternalElements\Repository\IlluminateDbRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Repository::class, IlluminateDbRepository::class);
        $this->app->singleton(\Cocktales\Domain\User\Components\Repository::class,
            \Cocktales\Domain\User\Components\Repository\IlluminateDbRepository::class);
    }
}
