<?php

namespace Cocktales\Framework\Entity;

use Cocktales\Framework\Exception\UndefinedValueException;

trait PrivateFluentHelpers
{
    protected $attributes = [];

    protected function get($key, $default = null)
    {
        return array_get($this->attributes, $key, $default);
    }

    protected function set($key, $value)
    {
        $this->attributes[$key] = $value;

        return $this;
    }

    /**
     * @param string $key
     * @return mixed
     * @throws UndefinedValueException
     */
    protected function getOrFail(string $key)
    {
        $value = $this->get($key);

        if ($value === null) {
            throw new UndefinedValueException("Key $key does not have a defined value");
        }

        return $value;
    }
}
