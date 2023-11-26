<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use TruckersMP\APIClient\Client;

class Event extends Model
{
    /**
     * The ID of the event.
     *
     * @var int
     */
    protected int $id;

    /**
     * The event type.
     *
     * @var EventType
     */
    protected EventType $eventType;

    /**
     * The event name.
     *
     * @var string
     */
    protected string $name;

    /**
     * The event slug.
     *
     * @var string
     */
    protected string $slug;

    /**
     * The event game.
     *
     * @var string
     */
    protected string $game;

    /**
     * The event server.
     *
     * @var EventServer
     */
    protected EventServer $server;

    /**
     * The event language.
     *
     * @var string
     */
    protected string $language;

    /**
     * The event departure location.
     *
     * @var EventLocation
     */
    protected EventLocation $departure;

    /**
     * The event arrival location.
     *
     * @var EventLocation
     */
    protected EventLocation $arrive;

    /**
     * The event start date.
     *
     * @var Carbon
     */
    protected Carbon $startAt;

    /**
     * The event meetup date.
     *
     * @var Carbon|null
     */
    protected ?Carbon $meetupAt;

    /**
     * The event banner.
     *
     * @var string|null
     */
    protected ?string $banner;

    /**
     * The event map.
     *
     * @var string|null
     */
    protected ?string $map;

    /**
     * The event description.
     *
     * @var string
     */
    protected string $description;

    /**
     * The event rule.
     *
     * @var string|null
     */
    protected ?string $rule;

    /**
     * The event voice link.
     *
     * @var string|null
     */
    protected ?string $voiceLink;

    /**
     * The event external link.
     *
     * @var string|null
     */
    protected ?string $externalLink;

    /**
     * The event featured status
     *
     * @var string|null
     */
    protected ?string $featured;

    /**
     * The event company.
     *
     * @var EventCompany|null
     */
    protected ?EventCompany $company;

    /**
     * The event organizer.
     *
     * @var EventOrganizer
     */
    protected EventOrganizer $organizer;

    /**
     * The event attendance.
     *
     * @var EventAttendance
     */
    protected EventAttendance $attendance;

    /**
     * The required event DLCs.
     *
     * @var Collection
     */
    protected Collection $dlcs;

    /**
     * The event url.
     *
     * @var string
     */
    protected string $url;

    /**
     * The event created at date.
     *
     * @var Carbon
     */
    protected Carbon $createdAt;

    /**
     * The event updated at date.
     *
     * @var Carbon
     */
    protected Carbon $updatedAt;

    /**
     * Create a new Event instance.
     *
     * @param  Client  $client
     * @param  array  $event
     * @return void
     */
    public function __construct(Client $client, array $event)
    {
        parent::__construct($client, $event);

        $this->id = $this->getValue('id');

        $this->eventType = new EventType(
            $this->getValue('event_type.key'),
            $this->getValue('event_type.name'),
        );

        $this->name = $this->getValue('name');
        $this->slug = $this->getValue('slug');
        $this->game = $this->getValue('game');

        $this->server = new EventServer(
            $this->getValue('server.id'),
            $this->getValue('server.name'),
        );

        $this->language = $this->getValue('language');

        $this->departure = new EventLocation(
            $this->getValue('departure.location'),
            $this->getValue('departure.city'),
        );

        $this->arrive = new EventLocation(
            $this->getValue('arrive.location'),
            $this->getValue('arrive.city'),
        );

        $this->startAt = new Carbon($this->getValue('start_at'), 'UTC');

        $meetupAt = $this->getValue('meetup_at');
        $this->meetupAt = $meetupAt ? new Carbon($meetupAt, 'UTC') : null;

        $this->banner = $this->getValue('banner');
        $this->map = $this->getValue('map');
        $this->description = $this->getValue('description');
        $this->rule = $this->getValue('rule');
        $this->voiceLink = $this->getValue('voice_link');
        $this->externalLink = $this->getValue('external_link');
        $this->featured = $this->getValue('featured');

        if ($this->getValue('vtc.id', 0) !== 0 && $this->getValue('vtc.name')) {
            $this->company = new EventCompany(
                $this->getValue('vtc.id'),
                $this->getValue('vtc.name'),
            );
        }

        $this->organizer = new EventOrganizer(
            $this->getValue('user.id'),
            $this->getValue('user.username'),
        );

        $this->url = $this->getValue('url');

        $this->attendance = new EventAttendance($client, $this->getValue('attendances', []));

        $this->dlcs = (new Collection($this->getValue('dlcs', [])))->mapInto(Dlc::class);

        $this->createdAt = new Carbon($this->getValue('created_at'), 'UTC');
        $this->updatedAt = new Carbon($this->getValue('updated_at'), 'UTC');
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
     * @return Carbon
     */
    public function getStartAt(): Carbon
    {
        return $this->startAt;
    }

    /**
     * Get the start date of the event.
     *
     * @return Carbon|null
     */
    public function getMeetupAt(): ?Carbon
    {
        return $this->meetupAt;
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
     * @return Collection|null
     */
    public function getDlcs(): ?Collection
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
