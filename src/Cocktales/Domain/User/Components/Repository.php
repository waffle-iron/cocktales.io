<?php

namespace Cocktales\Domain\User\Components;


use Cocktales\Domain\User\User;
use Cocktales\Framework\Exceptions\NotFoundException;

interface Repository
{
//    /**
//     * Add a user to the database
//     *
//     * @return User
//     */
//    public function addUser(): User;

    /**
     * @param int $id
     * @return User
     * @throws NotFoundException
     */
    public function getUserById(int $id): User;
}
