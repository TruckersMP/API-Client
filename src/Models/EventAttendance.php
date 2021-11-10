<?php

namespace TruckersMP\APIClient\Models;

use TruckersMP\APIClient\Collections\EventAttendeeCollection;

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
     * The confirmed users.
     *
     * @var EventAttendeeCollection|null
     */
    protected $confirmedUsers;

    /**
     * The unsure users.
     *
     * @var EventAttendeeCollection|null
     */
    protected $unsureUsers;

    /**
     * Create a new EventAttendance instance.
     *
     * @param int $confirmed
     * @param int $unsure
     * @param array|null $confirmedUsers
     * @param array|null $unsureUsers
     * @return void
     */
    public function __construct(
        int $confirmed,
        int $unsure,
        ?array $confirmedUsers,
        ?array $unsureUsers
    ) {
        $this->confirmed = $confirmed;
        $this->unsure = $unsure;
        if (isset($confirmedUsers)) {
            $this->confirmedUsers = new EventAttendeeCollection($confirmedUsers);
        }
        if (isset($unsureUsers)) {
            $this->unsureUsers = new EventAttendeeCollection($unsureUsers);
        }
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
     * @return int
     */
    public function getUnsure(): int
    {
        return $this->unsure;
    }

    /**
     * Get the confirmed attendees.
     *
     * @return EventAttendeeCollection|null
     */
    public function getConfirmedUsers(): ?EventAttendeeCollection
    {
        return $this->confirmedUsers;
    }

    /**
     * Get the unsure attendees.
     *
     * @return EventAttendeeCollection|null
     */
    public function getUnsureUsers(): ?EventAttendeeCollection
    {
        return $this->unsureUsers;
    }
}
