<?php

namespace TruckersMP\APIClient\Models;

class EventAttendance
{
    /**
     * The confirmed attendee count.
     *
     * @var int
     */
    protected $confirmed;

    /**
     * The unsure attendee count.
     *
     * @var int
     */
    protected $unsure;

    /**
     * Create a new EventAttendance instance.
     *
     * @param int $confirmed
     * @param int $unsure
     * @return void
     */
    public function __construct(
        int $confirmed,
        int $unsure
    )
    {
        $this->confirmed = $confirmed;
        $this->unsure = $unsure;
    }

    /**
     * Get the confirmed attendee count.
     *
     * @return int
     */
    public function getConfirmed(): int
    {
        return $this->confirmed;
    }

    /**
     * Get the unsure attendee count.
     *
     * @return string
     */
    public function getUnsure(): string
    {
        return $this->unsure;
    }
}
