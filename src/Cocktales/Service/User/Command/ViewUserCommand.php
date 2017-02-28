<?php

namespace Cocktales\Service\User\Command;

use Chief\Command;

class ViewUserCommand implements Command
{
    /**
     * @var int
     */
    private $id;

    /**
     * ViewUserCommand constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
