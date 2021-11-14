<?php

namespace TruckersMP\APIClient\Models;

use Illuminate\Support\Collection;

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
     * @var Collection|null
     */
    protected $confirmedUsers;

    /**
     * The unsure users.
     *
     * @var Collection|null
     */
    protected $unsureUsers;

    /**
     * Create a new EventAttendance instance.
     *
     * @param  int  $confirmed
     * @param  int  $unsure
     * @param  array|null  $confirmedUsers
     * @param  array|null  $unsureUsers
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
            $this->confirmedUsers = (new Collection($confirmedUsers))->mapInto(EventAttendee::class);
        }
        if (isset($unsureUsers)) {
            $this->unsureUsers = (new Collection($unsureUsers))->mapInto(EventAttendee::class);
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
     * @return Collection|null
     */
    public function getConfirmedUsers(): ?Collection
    {
        return $this->confirmedUsers;
    }

    /**
     * Get the unsure attendees.
     *
     * @return Collection|null
     */
    public function getUnsureUsers(): ?Collection
    {
        return $this->unsureUsers;
    }
}
