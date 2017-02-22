<?php

namespace Cocktales\Domain\Profile;

use Cocktales\Framework\Exceptions\NotFoundException;
use Illuminate\Support\Collection;

interface Repository
{
    /**
     * Add a new Profile to the repository.
     *
     * @param callable $callback
     *  The new Profile will be passed to the $callback by reference as its only argument. The Profile should be
     *  changed as necessary within the callback. Once callback completes, the new Profile will be saved.
     *
     * @return Profile
     */
    public function addProfile(callable $callback): Profile;

    /**
     * @param int $id
     * @return Profile
     * @throws NotFoundException
     */
    public function getProfileById(int $id);

    /**
     * @param int $id
     * @return Profile
     * @throws NotFoundException
     */
    public function getProfileByUserId(int $id);

    /**
     * Return a collection of all profiles
     *
     * @return Collection
     */
    public function getProfiles(): Collection;
}
