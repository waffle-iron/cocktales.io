<?php

namespace Cocktales\Framework\Entity;

trait NamedEntityTrait
{
    /**
     * @return string
     */
    public function getName()
    {
        return trim($this->get('name')) ?: '';
    }

    /**
     * @param mixed $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->set('name', (string) $name);
    }
}
