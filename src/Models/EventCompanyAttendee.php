<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use TruckersMP\APIClient\Client;

class EventCompanyAttendee extends Model
{
    /**
     * The attending company's ID.
     *
     * @var int
     */
    protected int $id;

    /**
     * The attending company's name.
     *
     * @var string
     */
    protected string $name;

    /**
     * If the attending company is following the event.
     *
     * @var bool
     */
    protected bool $following;

    /**
     * The date and time the company marked their attendance (UTC).
     *
     * @var Carbon
     */
    protected Carbon $createdAt;

    /**
     * The date and time the company updated their attendance (UTC).
     *
     * @var Carbon
     */
    protected Carbon $updatedAt;

    /**
     * Create a new EventCompanyAttendee instance.
     *
     * @param  Client  $client
     * @param  array  $attendee
     * @return void
     */
    public function __construct(Client $client, array $attendee)
    {
        parent::__construct($client, $attendee);

        $this->id = $this->getValue('id');
        $this->name = $this->getValue('name');
        $this->following = $this->getValue('following', false);
        $this->createdAt = new Carbon($this->getValue('created_at'), 'UTC');
        $this->updatedAt = new Carbon($this->getValue('updated_at'), 'UTC');
    }

    /**
     * Get the ID of the attending company.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the name of the attending company.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the event following status of the attending company.
     *
     * @return bool
     */
    public function isFollowing(): bool
    {
        return $this->following;
    }

    /**
     * Get the date and time the company marked their attendance.
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * Get the date and time the company updated their attendance.
     *
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }
}
