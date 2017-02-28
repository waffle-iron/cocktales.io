<?php

namespace Cocktales\Domain\User;


use Cocktales\Framework\Entity\PrivateFluentHelpers;

class User
{
    use PrivateFluentHelpers;

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): User
    {
        return $this->set('name', $name);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->get('name');
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User
    {
        return $this->set('username', $username);
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->get('username');
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        return $this->set('email', $email);
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->get('email');
    }

    /**
     * @param string $avatar
     * @return User
     */
    public function setAvatar(string $avatar): User
    {
        return $this->set('avatar', $avatar);
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->get('avatar');
    }
}
