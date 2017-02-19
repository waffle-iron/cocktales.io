<?php

namespace Cocktales\Framework\Entity;


trait UsesIncrementingIds
{
    /**
     * IdentifiedByUuid constructor.
     * @param string| $id
     */
    public function __construct($id = null)
    {
        if ($id) {
            $this->setId($id);
        }
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->get('id');
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        if ($this->getId()) {
            throw new \RuntimeException("You cannot change the ID of an entity which already has an ID");
        }
        
        return $this->set('id', $id);
    }
}
