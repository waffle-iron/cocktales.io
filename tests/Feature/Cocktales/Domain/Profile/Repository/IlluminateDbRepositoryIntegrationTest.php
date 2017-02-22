<?php

namespace Cocktales\Domain\Profile\Repository;

use Cocktales\Domain\Profile\Profile;
use Cocktales\Domain\Profile\Repository;
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

//    public function test_addProfile_increases_database_count()
//    {
//        $this->repository->addProfile(function (Profile $profile) {
//            $profile->setUserId(5);
//                $profile->setLocation('Consett');
//                $profile->setSlogan('Yo yo yo');
//                $profile->setAvatar('picture.jpg');
//        });
//
//        $fetched = $this->repository->getProfiles();
//
//        $this->assertEquals(1, $fetched->count());
//    }

//    public function test_updateProfile_does_not_increase_table_count()
//    {
//        $this->repository->addProfile(function (Profile $profile) {
//            $profile->setUserId(5);
//            $profile->setLocation('Consett');
//            $profile->setSlogan('Yo yo yo');
//            $profile->setAvatar('picture.jpg');
//        });
//
//        $fetched = $this->repository->getProfileByUserId(5);
//
//        dump($fetched->getId());
//    }

    public function test_profile_can_be_fetched_by_user_id()
    {
        $this->repository->addProfile(function (Profile $profile) {
            $profile->setUserId(15);
            $profile->setLocation('Consett');
            $profile->setSlogan('Yo yo yo');
            $profile->setAvatar('picture.jpg');
        });

        $fetched = $this->repository->getProfileByUserId(15);

        $this->assertEquals('Consett', $fetched->getLocation());
    }
}
