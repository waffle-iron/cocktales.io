<?php

namespace Cocktales\Service\Profile\Command;

use Chief\Command;

class CreateProfileCommand implements Command
{
    /**
     * @var \stdClass
     */
    private $data;

    /**
     * CreateProfileCommand constructor.
     * @param \stdClass $data
     */
    public function __construct(\stdClass $data)
    {
        $this->data = $data;
    }

    /**
     * @return \stdClass
     */
    public function getData(): \stdClass
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->data->user_id;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->data->location;
    }

    /**
     * @return string
     */
    public function getSlogan(): string
    {
        return $this->data->slogan;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->data->avatar;
    }
}
