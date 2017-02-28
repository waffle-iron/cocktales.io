<?php

namespace Cocktales\Domain\User;

use Cocktales\Framework\Exceptions\NotFoundException;
use Cocktales\FunctionalTestCase;
use Cocktales\User;

class UserOrchestratorIntegrationTest extends FunctionalTestCase
{
    protected $autoRunMigrations = true;

    /** @var  UserOrchestrator */
    private $orchestrator;

    public function setUp()
    {
        parent::setUp();
        $this->orchestrator = $this->app->make(UserOrchestrator::class);
    }

    public function test_getUserById_retrieves_a_user_object()
    {
        User::create([
            'name' => 'Joe Sweeny',
            'username' => 'joe',
            'email' => 'joe@example.com',
            'password' => bcrypt('password')
        ]);

        $fetched = $this->orchestrator->getUserById(1);

        $this->assertEquals(1, $fetched->getId());
        $this->assertEquals('Joe Sweeny', $fetched->getName());
        $this->assertEquals('joe', $fetched->getUsername());
        $this->assertEquals('joe@example.com', $fetched->getEmail());
    }

    public function test_getUserById_throws_exception_if_id_not_in_user_database()
    {
        $this->expectException(NotFoundException::class);
        $this->orchestrator->getUserById(999);
    }
}
