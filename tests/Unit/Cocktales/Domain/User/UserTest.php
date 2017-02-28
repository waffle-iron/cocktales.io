<?php

namespace Cocktales\Domain\User;


class UserTest extends \PHPUnit_Framework_TestCase
{
    public function test_setter_and_getter_methods_on_user_entity()
    {
        $user = (new User)
            ->setName('Joe Sweeny')
            ->setUsername('joe')
            ->setEmail('joe@example.com')
            ->setAvatar('picture.jpg');

        $this->assertEquals('Joe Sweeny', $user->getName());
        $this->assertEquals('joe', $user->getUsername());
        $this->assertEquals('joe@example.com', $user->getEmail());
        $this->assertEquals('picture.jpg', $user->getAvatar());
    }
}