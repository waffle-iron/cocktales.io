<?php

namespace Cocktales;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Testing\TestCase;

abstract class FunctionalTestCase extends TestCase
{
    use RunsMigrations;

    /**
     * @var bool Whether or not to automatically run DB migrations on each test setup()
     */
    protected $autoRunMigrations = false;

    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../../../src/bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }

    /**
     * Setup before test method runs
     *
     * Run migrations if $autoRunMigrations is set to true
     */
    public function setup()
    {
        parent::setUp();

        if ($this->autoRunMigrations) {
            $this->runMigrations($this->app);
        }
    }

    /**
     * Roll back migrations if they have been ran
     */
    public function tearDown()
    {
        if ($this->autoRunMigrations) {
            $this->rollbackMigrations();
        }
    }
}
