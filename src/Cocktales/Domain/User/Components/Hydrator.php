<?php

namespace Cocktales\Domain\User\Components;

use Cocktales\Domain\User\User;

class Hydrator
{
    /**
     * @param User $user
     * @return array
     */
    public function toRawData(User $user)
    {
        return [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'avatar' => $user->getAvatar()
        ];
    }

    /**
     * @param \stdClass $data
     * @return User
     */
    public function fromRawData(\stdClass $data): User
    {
        return (new User)
            ->setId($data->id)
            ->setName($data->name)
            ->setUsername($data->username)
            ->setEmail($data->email)
            ->setAvatar($data->avatar);
    }
}
