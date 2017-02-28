<?php

namespace Cocktales\Framework\Providers;

use Cocktales\Framework\Datetime\Clock;
use Cocktales\Framework\Datetime\FixedClock;
use Illuminate\Support\ServiceProvider;

class FrameworkServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Clock::class, FixedClock::class);
    }
}
