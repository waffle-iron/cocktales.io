<?php

namespace Cocktales\Domain\Profile;

use Cocktales\Domain\Profile\InternalElements\Repository;
use Cocktales\Framework\Exceptions\NotFoundException;

class ProfileOrchestrator
{
    /**
     * @var Repository
     */
    private $repository;

    /**
     * ProfileOrchestrator constructor.
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param callable $callback
     * @return Profile
     */
    public function addProfile(callable $callback)
    {
        $this->repository->addProfile($callback);
    }

    /**
     * @param Profile $profile
     * @return Profile
     */
    public function updateProfile(Profile $profile)
    {
        $this->repository->updateProfile($profile);
    }

    /**
     * @param int $user_id
     * @return Profile
     * @throws NotFoundException
     */
    public function getProfileByUserId(int $user_id): Profile
    {
        return $this->repository->getProfileByUserId($user_id);
    }
}
