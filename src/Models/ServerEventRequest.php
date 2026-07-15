<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use TruckersMP\APIClient\Client;

class ServerEventRequest extends Model
{
    /**
     * The ID of the event request.
     *
     * @var int
     */
    protected int $id;

    /**
     * The ID of the event for which the event request has been made.
     *
     * @var int|null
     */
    protected ?int $eventId;

    /**
     * The ID of the user who created the event request.
     *
     * @var int
     */
    protected int $userId;

    /**
     * The information about the event request.
     *
     * @var string
     */
    protected string $info;

    /**
     * The temporary rules for the server.
     *
     * @var string
     */
    protected string $rules;

    /**
     * The date and time the server starts at (UTC).
     *
     * @var Carbon
     */
    protected Carbon $startAt;

    /**
     * The date and time the server shuts down at (UTC).
     *
     * @var Carbon
     */
    protected Carbon $endAt;

    /**
     * The event request banner URL.
     *
     * @var string|null
     */
    protected ?string $headerImage;

    /**
     * URL to the page of the event.
     *
     * @var string|null
     */
    protected ?string $eventLink;

    /**
     * URL to the forum topic of the event.
     *
     * @var string|null
     */
    protected ?string $forumLink;

    /**
     * Create a new ServerEventRequest instance.
     *
     * @param  Client  $client
     * @param  array  $eventRequest
     * @return void
     */
    public function __construct(Client $client, array $eventRequest)
    {
        parent::__construct($client, $eventRequest);

        $this->id = $this->getValue('id');
        $this->eventId = $this->getValue('event_id');
        $this->userId = $this->getValue('user_id');
        $this->info = $this->getValue('info');
        $this->rules = $this->getValue('rules');
        $this->startAt = new Carbon($this->getValue('start_at'), 'UTC');
        $this->endAt = new Carbon($this->getValue('end_at'), 'UTC');
        $this->headerImage = $this->getValue('header_image');
        $this->eventLink = $this->getValue('event_link');
        $this->forumLink = $this->getValue('forum_link');
    }

    /**
     * Get the ID of the event request.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the ID of the event for which the event request has been made.
     *
     * Returns null if the event request was created directly.
     *
     * @return int|null
     */
    public function getEventId(): ?int
    {
        return $this->eventId;
    }

    /**
     * Get the ID of the user who created the event request.
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Get the information about the event request.
     *
     * @return string
     */
    public function getInfo(): string
    {
        return $this->info;
    }

    /**
     * Get the temporary rules for the server.
     *
     * @return string
     */
    public function getRules(): string
    {
        return $this->rules;
    }

    /**
     * Get the date and time the server starts at.
     *
     * @return Carbon
     */
    public function getStartAt(): Carbon
    {
        return $this->startAt;
    }

    /**
     * Get the date and time the server shuts down at.
     *
     * @return Carbon
     */
    public function getEndAt(): Carbon
    {
        return $this->endAt;
    }

    /**
     * Get the event request banner URL.
     *
     * @return string|null
     */
    public function getHeaderImage(): ?string
    {
        return $this->headerImage;
    }

    /**
     * Get the URL to the page of the event.
     *
     * @return string|null
     */
    public function getEventLink(): ?string
    {
        return $this->eventLink;
    }

    /**
     * Get the URL to the forum topic of the event.
     *
     * @return string|null
     */
    public function getForumLink(): ?string
    {
        return $this->forumLink;
    }
}
