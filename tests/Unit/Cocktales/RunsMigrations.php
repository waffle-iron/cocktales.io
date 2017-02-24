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
        $left = count($this->migrator->getRepository()->getRan());

        while ($left > 0) {
            $this->migrator->rollback([database_path('migrations')]);
            $left = count($this->migrator->getRepository()->getRan());
        }
        \Schema::drop('migrations');
    }
}
