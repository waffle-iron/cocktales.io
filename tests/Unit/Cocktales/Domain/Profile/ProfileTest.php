<?php

namespace Cocktales\Domain\Profile;


class ProfileTest extends \PHPUnit_Framework_TestCase
{
    public function test_profile_setters_and_getters()
    {
        $profile = (new Profile(007))
            ->setUserId(5)
            ->setLocation('Consett, Durham')
            ->setSlogan('Oi Oi')
            ->setFavouriteDrink('Pint of fosters')
            ->setDateCreated(new \DateTimeImmutable('2017-02-19 21:48:00'))
            ->setDateModified(new \DateTimeImmutable('2017-02-19 21:48:00'));

        $this->assertInstanceOf(Profile::class, $profile);
        $this->assertEquals(007, $profile->getId());
        $this->assertEquals(5, $profile->getUserId());
        $this->assertEquals('Oi Oi', $profile->getSlogan());
        $this->assertEquals('Pint of fosters', $profile->getFavouriteDrink());
        $this->assertEquals('2017-02-19 21:48:00', $profile->getDateCreated());
        $this->assertEquals('2017-02-19 21:48:00', $profile->getDateModified());
    }
}