<?php

namespace Cocktales\Domain\User\Components\Repository;


use Cocktales\Domain\User\Components\Hydrator;
use Cocktales\Domain\User\Components\Repository;
use Cocktales\Domain\User\User;
use Cocktales\Framework\Datetime\Clock;
use Cocktales\Framework\Exceptions\NotFoundException;
use Illuminate\Database\Connection;
use Illuminate\Database\Query\Builder;

class IlluminateDbRepository implements Repository
{
    /**
     * @var Connection
     */
    private $connection;
    /**
     * @var Hydrator
     */
    private $hydrator;
    /**
     * @var Clock
     */
    private $clock;

    /**
     * IlluminateDbRepository constructor.
     * @param Connection $connection
     * @param Hydrator $hydrator
     * @param Clock $clock
     */
    public function __construct(Connection $connection, Hydrator $hydrator, Clock $clock)
    {
        $this->connection = $connection;
        $this->hydrator = $hydrator;
        $this->clock = $clock;
    }

    /**
     * @param int $id
     * @return User
     * @throws NotFoundException
     */
    public function getUserById(int $id): User
    {
        $data = $this->table()->where('id', $id)->first();

        if (!$data) {
            throw new NotFoundException("User with ID {$id} does not exist");
        }

        return $this->hydrator->fromRawData($data);
    }

    /**
     * @return Builder
     */
    private function table(): Builder
    {
        return $this->connection->table('users');
    }
}

