<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use TruckersMP\APIClient\Collections\DlcCollection;

class Event
{
    /**
     * The ID of the event.
     *
     * @var int
     */
    protected $id;

    /**
     * Get the event type.
     *
     * @var EventType
     */
    protected $eventType;

    /**
     * The event name.
     *
     * @var string
     */
    protected $name;

    /**
     * The event slug.
     *
     * @var string
     */
    protected $slug;

    /**
     * The event game.
     *
     * @var string
     */
    protected $game;

    /**
     * Get the event server.
     *
     * @var EventServer
     */
    protected $server;

    /**
     * The event language.
     *
     * @var string
     */
    protected $language;

    /**
     * Get the event departure location.
     *
     * @var EventLocation
     */
    protected $departure;

    /**
     * Get the event arrival location.
     *
     * @var EventLocation
     */
    protected $arrive;

    /**
     * The event start date.
     *
     * @var string
     */
    protected $startAt;

    /**
     * The event banner.
     *
     * @var string|null
     */
    protected $banner;

    /**
     * The event map.
     *
     * @var string|null
     */
    protected $map;

    /**
     * The event description.
     *
     * @var string
     */
    protected $description;

    /**
     * The event rule.
     *
     * @var string|null
     */
    protected $rule;

    /**
     * The event voice link.
     *
     * @var string|null
     */
    protected $voiceLink;

    /**
     * The event external link.
     *
     * @var string|null
     */
    protected $externalLink;

    /**
     * If the event is featured
     *
     * @var string|null
     */
    protected $featured;

    /**
     * The event company.
     *
     * @var EventCompany|null
     */
    protected $company;

    /**
     * The event organizer.
     *
     * @var EventOrganizer
     */
    protected $organizer;

    /**
     * The event attendance.
     *
     * @var EventAttendance
     */
    protected $attendance;

    /**
     * The required event DLCs.
     *
     * @var DlcCollection|null
     */
    protected $dlcs;

    /**
     * The event url.
     *
     * @var string
     */
    protected $url;

    /**
     * The event created at date.
     *
     * @var Carbon
     */
    protected $createdAt;

    /**
     * The event updated at date.
     *
     * @var Carbon
     */
    protected $updatedAt;

    /**
     * Create a new Event instance.
     *
     * @param  array  $event
     * @return void
     */
    public function __construct(array $event)
    {
        $this->id = $event['id'];

        $this->eventType = new EventType(
            $event['event_type']['key'],
            $event['event_type']['name']
        );

        $this->name = $event['name'];
        $this->slug = $event['slug'];
        $this->game = $event['game'];

        $this->server = new EventServer(
            $event['server']['id'],
            $event['server']['name']
        );

        $this->language = $event['language'];

        $this->departure = new EventLocation(
            $event['departure']['location'],
            $event['departure']['city']
        );

        $this->arrive = new EventLocation(
            $event['arrive']['location'],
            $event['arrive']['city']
        );

        $this->startAt = new Carbon($event['start_at'], 'UTC');
        $this->banner = $event['banner'];
        $this->map = $event['map'];
        $this->description = $event['description'];
        $this->rule = $event['rule'];
        $this->voiceLink = $event['voice_link'];
        $this->externalLink = $event['external_link'];
        $this->featured = $event['featured'];

        if ($event['vtc']['id'] !== 0 && isset($event['vtc']['name'])) {
            $this->company = new EventCompany(
                $event['vtc']['id'],
                $event['vtc']['name']
            );
        }

        $this->organizer = new EventOrganizer(
            $event['user']['id'],
            $event['user']['username']
        );

        $this->url = $event['url'];

        $this->attendance = new EventAttendance(
            $event['attendances']['confirmed'],
            $event['attendances']['unsure'],
            $event['attendances']['confirmed_users'] ?? null,
            $event['attendances']['unsure_users'] ?? null
        );

        $this->dlcs = new DlcCollection($event['dlcs']);

        $this->createdAt = new Carbon($event['created_at'], 'UTC');
        $this->updatedAt = new Carbon($event['updated_at'], 'UTC');
    }

    /**
     * Get the ID of the event.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the type of the event.
     *
     * @return EventType
     */
    public function getEventType(): EventType
    {
        return $this->eventType;
    }

    /**
     * Get the name of the event.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the slug of the event.
     *
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Get the game the event is hosted on.
     *
     * @return string
     */
    public function getGame(): string
    {
        return $this->game;
    }

    /**
     * Get the server the event is hosted on.
     *
     * @return EventServer
     */
    public function getServer(): EventServer
    {
        return $this->server;
    }

    /**
     * Get the language of the event.
     *
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * Get the departure location of the event.
     *
     * @return EventLocation
     */
    public function getDeparture(): EventLocation
    {
        return $this->departure;
    }

    /**
     * Get the arrival location of the event.
     *
     * @return EventLocation
     */
    public function getArrive(): EventLocation
    {
        return $this->arrive;
    }

    /**
     * Get the start date of the event.
     *
     * @return string
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * Get the banner of the event.
     *
     * @return string|null
     */
    public function getBanner(): ?string
    {
        return $this->banner;
    }

    /**
     * Get the map of the event.
     *
     * @return string|null
     */
    public function getMap(): ?string
    {
        return $this->map;
    }

    /**
     * Get the description of the event.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Get the rule of the event.
     *
     * @return string|null
     */
    public function getRule(): ?string
    {
        return $this->rule;
    }

    /**
     * Get the voice link of the event.
     *
     * @return string|null
     */
    public function getVoiceLink(): ?string
    {
        return $this->voiceLink;
    }

    /**
     * Get the external link of the event.
     *
     * @return string|null
     */
    public function getExternalLink(): ?string
    {
        return $this->externalLink;
    }

    /**
     * Get the featured status of the event.
     *
     * @return string|null
     */
    public function getFeatured(): ?string
    {
        return $this->featured;
    }

    /**
     * Get the company of the event.
     *
     * @return EventCompany|null
     */
    public function getCompany(): ?EventCompany
    {
        return $this->company;
    }

    /**
     * Get the organizer of the event.
     *
     * @return EventOrganizer
     */
    public function getOrganizer(): EventOrganizer
    {
        return $this->organizer;
    }

    /**
     * Get the attendance of the event.
     *
     * @return EventAttendance
     */
    public function getAttendance(): EventAttendance
    {
        return $this->attendance;
    }

    /**
     * Get the required DLCs of the event.
     *
     * @return DlcCollection|null
     */
    public function getDlcs(): ?DlcCollection
    {
        return $this->dlcs;
    }

    /**
     * Get the url of the event.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Get the created at of the event.
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * Get the updated at of the event.
     *
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }
}
