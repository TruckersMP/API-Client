<?php

namespace TruckersMP\APIClient\Models;

use Illuminate\Support\Collection;
use TruckersMP\APIClient\Client;

class EventAttendance extends Model
{
    /**
     * The confirmed attendee count.
     *
     * @var int
     */
    protected int $confirmed;

    /**
     * The unsure attendee count.
     *
     * @var int
     */
    protected int $unsure;

    /**
     * The confirmed users.
     *
     * @var Collection
     */
    protected Collection $confirmedUsers;

    /**
     * The unsure users.
     *
     * @var Collection
     */
    protected Collection $unsureUsers;

    /**
     * Create a new EventAttendance instance.
     *
     * @param  Client  $client
     * @param  array  $attendance
     * @return void
     */
    public function __construct(Client $client, array $attendance)
    {
        parent::__construct($client, $attendance);

        $this->confirmed = $this->getValue('confirmed');
        $this->unsure = $this->getValue('unsure');

        $mapAttendee = fn (array $attendee) => new EventAttendee($client, $attendee);

        $this->confirmedUsers = (new Collection($this->getValue('confirmed_users', [])))->map($mapAttendee);
        $this->unsureUsers = (new Collection($this->getValue('unsure_users', [])))->map($mapAttendee);
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
     * @return Collection
     */
    public function getConfirmedUsers(): Collection
    {
        return $this->confirmedUsers;
    }

    /**
     * Get the unsure attendees.
     *
     * @return Collection
     */
    public function getUnsureUsers(): Collection
    {
        return $this->unsureUsers;
    }
}
