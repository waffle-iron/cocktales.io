<?php

namespace Cocktales\Domain\Profile;

use Cocktales\Framework\Entity\PrivateFluentHelpers;
use Cocktales\Framework\Entity\TimestampedEntityTrait;
use Cocktales\Framework\Entity\UsesIncrementingIds;

class Profile
{
    use PrivateFluentHelpers;
    use UsesIncrementingIds;
    use TimestampedEntityTrait;

    /**
     * @param int $id
     * @return Profile
     */
    public function setUserId(int $id): Profile
    {
        return $this->set('user_id', $id);
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->get('user_id');
    }

    /**
     * @param string $location
     * @return Profile
     */
    public function setLocation(string $location): Profile
    {
        return $this->set('location', $location ?: null);
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->get('location');
    }

    /**
     * @param string $slogan
     * @return Profile
     */
    public function setSlogan(string $slogan): Profile
    {
        return $this->set('slogan', $slogan);
    }

    /**
     * @return string
     */
    public function getSlogan(): string
    {
        return $this->get('slogan');
    }

    /**
     * @param string $avatar
     * @return Profile
     */
    public function setAvatar(string $avatar): Profile
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
