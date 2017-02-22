<?php

namespace Cocktales;

use Illuminate\Contracts\Container\Container;
use Illuminate\Database\Migrations\MigrationRepositoryInterface;
use Illuminate\Database\Migrations\Migrator;

trait RunsMigrations
{
    /**
     * @var Migrator
     */
    protected $migrator;
    /** @var  MigrationRepositoryInterface */
    protected $migrationRepo;

    /**
     * Run migrations
     */
    protected function runMigrations(Container $container)
    {
        $this->migrationRepo = app('migration.repository');
        $this->migrator = app('migrator');

        try {
            $this->migrationRepo->createRepository();
        } catch (\Exception $e) {
            // Migrations table probably already exists
        }
        $this->migrator->run(base_path('database/migrations'));
    }

    /**
     * Roll back migrations
     */
    protected function rollbackMigrations()
    {
        while ($this->migrator->rollback() > 0) {

        }
        \Schema::drop('migrations');
    }
}
