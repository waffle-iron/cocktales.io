<?php

namespace Cocktales\Domain\Profile;

use Cocktales\Domain\Profile\InternalElements\Repository;

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

    public function addProfile(callable $callback)
    {
        $this->repository->addProfile($callback);
    }

    public function updateProfile(Profile $profile)
    {
        $this->repository->updateProfile($profile);
    }
}
