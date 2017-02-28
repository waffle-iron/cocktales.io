<?php

namespace Cocktales\Domain\User\Repository;

use Cocktales\Domain\User\Components\Repository;
use Cocktales\Framework\Exceptions\NotFoundException;
use Cocktales\FunctionalTestCase;
use Cocktales\User;

class IlluminateDbRepositoryIntegrationTest extends FunctionalTestCase
{
    protected $autoRunMigrations = true;

    /** @var  Repository */
    private $repository;

    public function setUp()
    {
        parent::setup();
        $this->repository = $this->app->make(Repository::class);
    }

    public function test_getUserById_returns_a_user_object()
    {
        User::create([
            'name' => 'Joe Sweeny',
            'username' => 'joe',
            'email' => 'joe@example.com',
            'password' => bcrypt('password')
        ]);

        $fetched = $this->repository->getUserById(1);

        $this->assertEquals(1, $fetched->getId());
        $this->assertEquals('Joe Sweeny', $fetched->getName());
        $this->assertEquals('joe', $fetched->getUsername());
        $this->assertEquals('joe@example.com', $fetched->getEmail());
    }

    public function test_getUserById_throws_exception_if_id_not_in_user_database()
    {
        $this->expectException(NotFoundException::class);
        $this->repository->getUserById(999);
    }
}
