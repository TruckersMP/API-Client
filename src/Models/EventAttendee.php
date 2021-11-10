<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;

class EventAttendee
{
    /**
     * The attendee's user ID.
     *
     * @var int
     */
    protected $id;

    /**
     * The attendee's username.
     *
     * @var string
     */
    protected $username;

    /**
     * If the attendee is being followed.
     * TODO: Check what this field means/does.
     *
     * @var bool
     */
    protected $following;

    /**
     * The event attendee created at date.
     *
     * @var Carbon
     */
    protected $createdAt;

    /**
     * The event attendee updated at date.
     *
     * @var Carbon
     */
    protected $updatedAt;

    /**
     * Create a new EventAttendee instance.
     *
     * @param array $attendee
     * @return void
     */
    public function __construct(array $attendee)
    {
        $this->id = $attendee['id'];
        $this->username = $attendee['username'];
        $this->following = $attendee['following'];
        $this->createdAt = new Carbon($attendee['created_at'], 'UTC');
        $this->updatedAt = new Carbon($attendee['updated_at'], 'UTC');
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
     * Get the following status of the attendee.
     *
     * @return bool
     */
    public function getFollowing(): bool
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
