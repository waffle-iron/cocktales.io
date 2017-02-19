<?php

namespace Cocktales\Framework\Entity;

use Cake\Chronos\Chronos;
use DateTime;
use DateTimeImmutable;

trait TimestampedEntityTrait
{
    /**
     * @param \DateTimeInterface $dateTime
     * @return $this
     */
    public function setDateCreated(\DateTimeInterface $dateTime)
    {
        return $this->set('created_at', $dateTime);
    }

    /**
     * @return Chronos
     */
    public function getDateCreated(): Chronos
    {
        $date = $this->get('created_at', new DateTime);
        if ($date instanceof DateTime) {
            // It is mutable. Make it immutable
            $date = DateTimeImmutable::createFromMutable($date);
        }

        return Chronos::instance($date);
    }

    /**
     * @param \DateTimeInterface $dateTime
     * @return $this
     */
    public function setDateModified(\DateTimeInterface $dateTime)
    {
        return $this->set('updated_at', $dateTime);
    }

    /**
     * @return Chronos
     */
    public function getDateModified(): Chronos
    {
        $date = $this->get('updated_at', new DateTime);
        if ($date instanceof DateTime) {
            // It is mutable. Make it immutable
            $date = DateTimeImmutable::createFromMutable($date);
        }

        return Chronos::instance($date);
    }
}
