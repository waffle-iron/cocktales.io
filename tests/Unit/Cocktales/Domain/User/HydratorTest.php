<?php

namespace Cocktales\Domain\User;

use Cocktales\Domain\User\Components\Hydrator;

class HydratorTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Hydrator */
    private $hydrator;

    public function setUp()
    {
        $this->hydrator = new Hydrator;
    }

    public function test_converts_user_to_raw_data()
    {
        $data = (object) $this->hydrator->toRawData((new User)
            ->setId(1)
            ->setName('Joe Sweeny')
            ->setUsername('joe')
            ->setEmail('joe@example.com')
            ->setAvatar('picture.jpg')
        );

        $this->assertEquals(1, $data->id);
        $this->assertEquals('Joe Sweeny', $data->name);
        $this->assertEquals('joe', $data->username);
        $this->assertEquals('joe@example.com', $data->email);
        $this->assertEquals('picture.jpg', $data->avatar);
    }

    public function test_converts_raw_data_into_user_object()
    {
        $user = $this->hydrator->fromRawData(
            (object) [
               'id' => 007,
                'name' => 'Joe Sweeny',
                'username' => 'joe',
                'email' => 'joe@example.com',
                'avatar' => 'picture.jpg'
            ]
        );

        $this->assertEquals(007, $user->getId());
        $this->assertEquals('Joe Sweeny', $user->getName());
        $this->assertEquals('joe', $user->getUsername());
        $this->assertEquals('joe@example.com', $user->getEmail());
        $this->assertEquals('picture.jpg', $user->getAvatar());
    }
}
