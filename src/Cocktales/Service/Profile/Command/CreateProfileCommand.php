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
}
