<?php

namespace Cocktales\Domain\Profile\Repository;

use Cocktales\Domain\Profile\Hydrator;
use Cocktales\Domain\Profile\Profile;
use Cocktales\Domain\Profile\Repository;
use Cocktales\Framework\Datetime\Clock;
use Cocktales\Framework\Exceptions\NotFoundException;
use Illuminate\Database\Connection;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class IlluminateDbRepository implements Repository
{
    /**
     * @var Connection
     */
    private $connection;
    /**
     * @var Clock
     */
    private $clock;
    /**
     * @var Hydrator
     */
    private $hydrator;

    /**
     * IlluminateDbRepository constructor.
     * @param Connection $connection
     * @param Hydrator $hydrator
     * @param Clock $clock
     */
    public function __construct(Connection $connection, Hydrator $hydrator, Clock $clock)
    {
        $this->connection = $connection;
        $this->clock = $clock;
        $this->hydrator = $hydrator;
    }

    /**
     * @inheritdoc
     */
    public function addProfile(callable $callback): Profile
    {
        $profile = new Profile;
        $callback($profile);

        $profile->setDateCreated($this->clock->now());
        $profile->setDateModified($this->clock->now());
        $data = $this->hydrator->toRawData($profile);

        $id = $this->table()->insertGetId($data);

        $profile->setId($id);

        return $profile;
    }

    /**
     * @param int $id
     * @return Profile
     * @throws NotFoundException
     */
    public function getProfileById(int $id)
    {
        // TODO: Implement getProfileById() method.
    }

    /**
     * @param int $id
     * @return Profile
     * @throws NotFoundException
     */
    public function getProfileByUserId(int $id)
    {
        $data = $this->table()->where('user_id', $id)->first();

        if (!$data) {
            throw new NotFoundException("Profile with User ID {$id} does not exist");
        }

        return $this->hydrator->fromRawData($data);
    }

    /**
     * Return a collection of all profiles
     *
     * @return Collection
     */
    public function getProfiles(): Collection
    {
        return Collection::make($this->table()->get());
    }
    /**
     * @return Builder
     */
    private function table(): Builder
    {
        return $this->connection->table('profile');
    }
}
