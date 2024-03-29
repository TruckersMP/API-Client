<?php

namespace TruckersMP\APIClient\Models;

use Illuminate\Support\Collection;
use TruckersMP\APIClient\Client;

class EventAttendance extends Model
{
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
     * The confirmed companies.
     *
     * @var Collection
     */
    protected Collection $confirmedCompanies;

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

        $mapUser = fn (array $attendee) => new EventAttendee($client, $attendee);
        $mapCompany = fn (array $attendee) => new EventCompanyAttendee($client, $attendee);

        $this->confirmedUsers = (new Collection($this->getValue('confirmed_users', [])))->map($mapUser);
        $this->unsureUsers = (new Collection($this->getValue('unsure_users', [])))->map($mapUser);
        $this->confirmedCompanies = (new Collection($this->getValue('confirmed_vtcs', [])))->map($mapCompany);
    }

    /**
     * Get the confirmed attendee count.
     *
     * @return int
     *
     * @deprecated Use the collection of confirmed users instead.
     */
    public function getConfirmed(): int
    {
        return $this->getConfirmedUsers()->count();
    }

    /**
     * Get the unsure attendee count.
     *
     * @return int
     *
     * @deprecated Use the collection of unsure users instead.
     */
    public function getUnsure(): int
    {
        return $this->getUnsureUsers()->count();
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

    /**
     * Get the confirmed companies.
     *
     * @return Collection
     */
    public function getConfirmedCompanies(): Collection
    {
        return $this->confirmedCompanies;
    }
}
