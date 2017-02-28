<?php

namespace Cocktales\Domain\Profile;

use Cocktales\Domain\Profile\InternalElements\Repository;
use Cocktales\FunctionalTestCase;

class ProfileOrchestratorIntegrationTest extends FunctionalTestCase
{
    protected $autoRunMigrations = true;

    /** @var  Repository */
    private $repository;

    /** @var  ProfileOrchestrator */
    private $orchestrator;

    public function setUp()
    {
        parent::setUp();
        $this->repository = $this->app->make(Repository::class);
        $this->orchestrator = $this->app->make(ProfileOrchestrator::class);
    }

    public function test_addProfile_adds_new_profile_to_the_database()
    {
        $this->orchestrator->addProfile(function (Profile $profile) {
            $profile->setUserId(5);
            $profile->setLocation('Consett');
            $profile->setSlogan("Let's get drunk");
            $profile->setFavouriteDrink('Water');
        });

        $fetched = $this->repository->getProfileById(1);

        $this->assertEquals(5, $fetched->getUserId());
        $this->assertEquals('Consett', $fetched->getLocation());
        $this->assertEquals("Let's get drunk", $fetched->getSlogan());
    }

    public function test_updateProfile_updates_existing_profile_and_does_not_increase_repository_count()
    {
        $this->orchestrator->addProfile(function (Profile $profile) {
            $profile->setUserId(5);
            $profile->setLocation('Consett');
            $profile->setSlogan("Let's get drunk");
            $profile->setFavouriteDrink('Water');
        });

        $fetched = $this->repository->getProfileById(1);

        $this->orchestrator->updateProfile($fetched);

        $this->assertEquals(1, $this->repository->getProfiles()->count());
    }

    public function test_getProfileByUserId_retrieves_profile_from_database()
    {
        $this->orchestrator->addProfile(function (Profile $profile) {
            $profile->setUserId(5);
            $profile->setLocation('Consett');
            $profile->setSlogan("Let's get drunk");
            $profile->setFavouriteDrink('Water');
        });

        $fetched = $this->orchestrator->getProfileByUserId(5);

        $this->assertEquals('Consett', $fetched->getLocation());
        $this->assertEquals("Let's get drunk", $fetched->getSlogan());
        $this->assertEquals('Water', $fetched->getFavouriteDrink());
    }
}
