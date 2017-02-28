<?php

namespace Cocktales\Domain\Profile\InternalElements\Repository;

use Cocktales\Domain\Profile\InternalElements\Repository;
use Cocktales\Domain\Profile\Profile;
use Cocktales\Framework\Exceptions\NotFoundException;
use Cocktales\FunctionalTestCase;

class IlluminateDbRepositoryIntegrationTest extends FunctionalTestCase
{
    protected $autoRunMigrations = true;

    /** @var  Repository */
    private $repository;

    public function setUp()
    {
        parent::setUp();
        $this->repository = $this->app->make(Repository::class);
    }

    public function test_addProfile_increases_database_count()
    {
        $this->repository->addProfile(function (Profile $profile) {
            $profile->setUserId(5);
                $profile->setLocation('Consett');
                $profile->setSlogan('Yo yo yo');
                $profile->setFavouriteDrink('Water');
        });

        $fetched = $this->repository->getProfiles();

        $this->assertEquals(1, $fetched->count());

        $this->repository->addProfile(function (Profile $profile) {
            $profile->setUserId(22);
            $profile->setLocation('New York');
            $profile->setSlogan('Hello');
            $profile->setFavouriteDrink('Water');
        });

        $fetched = $this->repository->getProfiles();

        $this->assertEquals(2, $fetched->count());
    }

    public function test_updateProfile_does_not_increase_table_count()
    {
        $this->repository->addProfile(function (Profile $profile) {
            $profile->setUserId(5);
            $profile->setLocation('Consett');
            $profile->setSlogan('Yo yo yo');
            $profile->setFavouriteDrink('Water');
        });

        $fetched = $this->repository->getProfileById(1);

        $this->repository->updateProfile($fetched);

        $fetched = $this->repository->getProfiles();

        $this->assertEquals(1, $fetched->count());
    }

    public function test_profile_can_be_fetched_by_user_id()
    {
        $this->repository->addProfile(function (Profile $profile) {
            $profile->setUserId(15);
            $profile->setLocation('Consett');
            $profile->setSlogan('Yo yo yo');
            $profile->setFavouriteDrink('Water');
        });

        $fetched = $this->repository->getProfileByUserId(15);

        $this->assertEquals('Consett', $fetched->getLocation());
    }

    public function test_updateProfile_throws_exception_if_profile_is_not_already_in_database()
    {
        $this->expectException(NotFoundException::class);
        $this->repository->updateProfile(new Profile);
    }

    public function test_exception_thrown_if_fetching_profile_that_is_not_in_the_database()
    {
        $this->expectException(NotFoundException::class);
        $this->repository->getProfileById(10);
    }
}
