<?php

namespace Cocktales\Domain\Profile;

use Cocktales\Domain\Profile\InternalElements\Hydrator;

class HydratorTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Hydrator */
    private $hydrator;

    public function setUp()
    {
        $this->hydrator = new Hydrator;
    }

    public function test_converts_profile_to_raw_data()
    {
        $data = (object) $this->hydrator->toRawData((new Profile(1))
            ->setUserId(5)
            ->setLocation('London')
            ->setSlogan('Be Merry')
            ->setAvatar('picture.jpg')
            ->setDateCreated(new \DateTimeImmutable('2017-02-20 20:43:00'))
            ->setDateModified(new \DateTimeImmutable('2017-02-20 20:43:00')));

        $this->assertEquals(1, $data->id);
        $this->assertEquals(5, $data->user_id);
        $this->assertEquals('London', $data->location);
        $this->assertEquals('Be Merry', $data->slogan);
        $this->assertEquals('picture.jpg', $data->avatar);
        $this->assertEquals('2017-02-20 20:43:00', $data->created_at);
        $this->assertEquals('2017-02-20 20:43:00', $data->updated_at);
    }

    public function test_converts_raw_data_into_profile_object()
    {
        $profile = $this->hydrator->fromRawData(
            (object) [
                'id' => 1,
                'user_id' => 5,
                'location' => 'London',
                'slogan' => 'Be Merry',
                'avatar' => 'picture.jpg',
                'created_at' => '2017-02-16 10:42:00',
                'updated_at' => '2017-02-16 10:42:00'
            ]);

        $this->assertEquals(1, $profile->getId());
        $this->assertEquals(5, $profile->getUserId());
        $this->assertEquals('London', $profile->getLocation());
        $this->assertEquals('Be Merry', $profile->getSlogan());
        $this->assertEquals('picture.jpg', $profile->getAvatar());
        $this->assertEquals('2017-02-16 10:42:00', $profile->getDateCreated());
        $this->assertEquals('2017-02-16 10:42:00', $profile->getDateModified());
    }
}
