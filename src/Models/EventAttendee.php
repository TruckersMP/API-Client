<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use TruckersMP\APIClient\Client;

class EventAttendee extends Model
{
    /**
     * The attendee's user ID.
     *
     * @var int
     */
    protected int $id;

    /**
     * The attendee's username.
     *
     * @var string
     */
    protected string $username;

    /**
     * If the attendee is following the event.
     *
     * @var bool
     */
    protected bool $following;

    /**
     * The event attendee created at date.
     *
     * @var Carbon
     */
    protected Carbon $createdAt;

    /**
     * The event attendee updated at date.
     *
     * @var Carbon
     */
    protected Carbon $updatedAt;

    /**
     * Create a new EventAttendee instance.
     *
     * @param  Client  $client
     * @param  array  $attendee
     * @return void
     */
    public function __construct(Client $client, array $attendee)
    {
        parent::__construct($client, $attendee);

        $this->id = $this->getValue('id');
        $this->username = $this->getValue('username');
        $this->following = $this->getValue('following', false);
        $this->createdAt = new Carbon($this->getValue('created_at'), 'UTC');
        $this->updatedAt = new Carbon($this->getValue('updated_at'), 'UTC');
    }

    /**
     * Get the ID of the attendee.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the username of the attendee.
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Get the event following status of the attendee.
     *
     * @return bool
     */
    public function isFollowing(): bool
    {
        return $this->following;
    }

    /**
     * Get the created at date of the attendee.
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * Get the updated at date of the attendee.
     *
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }
}
