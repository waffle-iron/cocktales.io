<?php

namespace Cocktales\Domain\Profile;


class Hydrator
{
    /**
     * @param Profile $profile
     * @return array
     */
    public function toRawData(Profile $profile)
    {
        return [
            'id' => $profile->getId(),
            'user_id' => $profile->getUserId(),
            'location' => $profile->getLocation(),
            'slogan' => $profile->getSlogan(),
            'avatar' => $profile->getAvatar(),
            'created_at' => $profile->getDateCreated(),
            'updated_at' => $profile->getDateModified()
        ];
    }

    /**
     * @param \stdClass $data
     * @return Profile
     */
    public function fromRawData(\stdClass $data)
    {
        return (new Profile($data->id))
            ->setUserId($data->user_id)
            ->setLocation($data->location)
            ->setSlogan($data->slogan)
            ->setAvatar($data->avatar)
            ->setDateCreated(new \DateTimeImmutable($data->created_at))
            ->setDateModified(new \DateTimeImmutable($data->updated_at));
    }
}
