<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;

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
    protected $event_type;

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
    protected $start_at;

    /**
     * The event banner.
     *
     * @var string
     */
    protected $banner;

    /**
     * The event map.
     *
     * @var string
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
     * @var string
     */
    protected $rule;

    /**
     * The event voice link.
     *
     * @var string
     */
    protected $voice_link;

    /**
     * The event external link.
     *
     * @var string
     */
    protected $external_link;

    /**
     * If the event is featured
     *
     * @var string
     */
    protected $featured;

    /**
     * Get the event company.
     *
     * @var EventCompany
     */
    protected $company;

    /**
     * Get the event organizer.
     *
     * @var EventOrganizer
     */
    protected $organizer;

    /**
     * Get the event attendance.
     *
     * @var EventAttendance
     */
    protected $attendance;

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
    protected $created_at;

    /**
     * The event updated at date.
     *
     * @var Carbon
     */
    protected $updated_at;

    /**
     * Create a new Event instance.
     *
     * @param  array  $event
     * @return void
     */
    public function __construct(array $event)
    {
        $this->id = $event['id'];

        $this->event_type = new EventType(
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

        $this->start_at = new Carbon($event['start_at'], 'UTC');
        $this->banner = $event['banner'];
        $this->map = $event['map'];
        $this->description = $event['description'];
        $this->rule = $event['rule'];
        $this->voice_link = $event['voice_link'];
        $this->external_link = $event['external_link'];
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
            $event['attendances']['unsure']
        );

        $this->created_at = new Carbon($event['created_at'], 'UTC');
        $this->updated_at = new Carbon($event['updated_at'], 'UTC');
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
        return $this->event_type;
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
        return $this->start_at;
    }

    /**
     * Get the banner of the event.
     *
     * @return string
     */
    public function getBanner(): string
    {
        return $this->banner;
    }

    /**
     * Get the map of the event.
     *
     * @return string
     */
    public function getMap(): string
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
     * @return string
     */
    public function getRule(): string
    {
        return $this->rule;
    }

    /**
     * Get the voice link of the event.
     *
     * @return string
     */
    public function getVoiceLink(): string
    {
        return $this->voice_link;
    }

    /**
     * Get the external link of the event.
     *
     * @return string
     */
    public function getExternalLink(): string
    {
        return $this->external_link;
    }

    /**
     * Get the featured status of the event.
     *
     * @return string
     */
    public function getFeatured(): string
    {
        return $this->featured;
    }

    /**
     * Get the company of the event.
     *
     * @return EventCompany
     */
    public function getCompany(): EventCompany
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
        return $this->created_at;
    }

    /**
     * Get the updated at of the event.
     *
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updated_at;
    }
}
