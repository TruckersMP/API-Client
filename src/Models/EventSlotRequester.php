<?php

namespace TruckersMP\APIClient\Models;

use TruckersMP\APIClient\Client;

class EventSlotRequester extends Model
{
    /**
     * The ID of the company that requested the slot.
     *
     * @var int
     */
    protected int $id;

    /**
     * The name of the company that requested the slot.
     *
     * @var string
     */
    protected string $name;

    /**
     * The logo URL of the company that requested the slot.
     *
     * @var string
     */
    protected string $logoUrl;

    /**
     * The expected amount of attendees set by the requesting company.
     *
     * @var int
     */
    protected int $expectedAttendees;

    /**
     * Create a new EventSlotRequester instance.
     *
     * @param  Client  $client
     * @param  array  $requester
     * @return void
     */
    public function __construct(Client $client, array $requester)
    {
        parent::__construct($client, $requester);

        $this->id = $this->getValue('id');
        $this->name = $this->getValue('name');
        $this->logoUrl = $this->getValue('logo_url');
        $this->expectedAttendees = $this->getValue('expected_attendees');
    }

    /**
     * Get the ID of the company that requested the slot.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the name of the company that requested the slot.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the logo URL of the company that requested the slot.
     *
     * @return string
     */
    public function getLogoUrl(): string
    {
        return $this->logoUrl;
    }

    /**
     * Get the expected amount of attendees set by the requesting company.
     *
     * A value of 0 means the slot was allocated directly.
     *
     * @return int
     */
    public function getExpectedAttendees(): int
    {
        return $this->expectedAttendees;
    }
}
