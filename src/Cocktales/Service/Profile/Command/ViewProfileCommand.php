<?php

namespace Cocktales\Service\Profile\Command;

use Chief\Command;

class ViewProfileCommand implements Command
{
    /**
     * @var int
     */
    private $user_id;

    /**
     * ViewProfileCommand constructor.
     * @param int $user_id
     */
    public function __construct(int $user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}
