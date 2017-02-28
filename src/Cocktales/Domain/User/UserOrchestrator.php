<?php

namespace Cocktales\Domain\User;


use Cocktales\Domain\User\Components\Repository;
use Cocktales\Framework\Exceptions\NotFoundException;

class UserOrchestrator
{
    /**
     * @var Repository
     */
    private $repository;

    /**
     * UserOrchestrator constructor.
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
     * @return User
     * @throws NotFoundException
     */
    public function getUserById(int $id): User
    {
        return $this->repository->getUserById($id);
    }
}
