<?php

namespace Cocktales\Framework\Datetime;

use Cake\Chronos\Chronos;
use DateTimeImmutable;

class FixedClock implements Clock
{
    /**
     * @var DateTimeImmutable
     */
    private $currentDatetime;

    /**
     * SystemClock constructor.
     * @param DateTimeImmutable $currentDatetime
     */
    public function __construct(DateTimeImmutable $currentDatetime = null)
    {
        $this->currentDatetime = $currentDatetime ?: new DateTimeImmutable();
    }

    /**
     * {@inheritDoc}
     */
    public function getCurrentDatetime()
    {
        return Chronos::instance($this->currentDatetime);
    }

    /**
     * {@inheritdoc}
     */
    public function now()
    {
        return $this->getCurrentDatetime();
    }
}
