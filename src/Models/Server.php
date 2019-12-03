<?php

namespace TruckersMP\APIClient\Models;

class Server
{
    /**
     * The ID given to the server.
     *
     * @var int
     */
    protected $id;

    /**
     * What game the server is for.
     *
     * @var string
     */
    protected $game;

    /**
     * The server ip address.
     *
     * @var string
     */
    protected $ip;

    /**
     * The port that the server runs on.
     *
     * @var int
     */
    protected $port;

    /**
     * The name of the server.
     *
     * @var string
     */
    protected $name;

    /**
     * The short name for the server.
     *
     * @var string
     */
    protected $shortName;

    /**
     * Shown in-game in front of a player's ID.
     *
     * @var string|null
     */
    protected $idPrefix;

    /**
     * If the server is online or not.
     *
     * @var bool
     */
    protected $online;

    /**
     * How many players are currently on the server.
     *
     * @var int
     */
    protected $players;

    /**
     * Amount of players waiting in the queue to join the server.
     *
     * @var int
     */
    protected $queue;

    /**
     * The max amount of players allowed on the server at once.
     *
     * @var int
     */
    protected $maxPlayers;

    /**
     * Determines the order in which servers are displayed.
     *
     * @var int
     */
    protected $displayOrder;

    /**
     * If the speed limiter is enabled on the server (110 kmh for ETS2 and 80 mph for ATS).
     *
     * @var bool
     */
    protected $speedLimiter;

    /**
     * If server wide collisions is enabled.
     *
     * @var bool
     */
    protected $collisions;

    /**
     * If cars are enabled for players.
     *
     * @var bool
     */
    protected $carsForPlayers;

    /**
     * If police cars can be driven by players.
     *
     * @var bool
     */
    protected $policeCarsForPlayers;

    /**
     * If AFK kick is enabled for players.
     *
     * @var bool
     */
    protected $afkEnabled;

    /**
     * If the server is an event server.
     *
     * @var bool
     */
    protected $event;

    /**
     * Determine whether the server hosts special event file.
     *
     * @var bool
     */
    protected $specialEvent;

    /**
     * Determine whether the server hosts ProMods.
     *
     * @var bool
     */
    protected $promods;

    /**
     * The server tick rate.
     *
     * @var bool
     */
    protected $syncDelay;

    /**
     * Create a new Server instance.
     *
     * @param array $server
     */
    public function __construct(array $server)
    {
        $this->id = $server['id'];
        $this->game = $server['game'];
        $this->ip = $server['ip'];
        $this->port = intval($server['port']);
        $this->name = $server['name'];
        $this->shortName = $server['shortname'];
        $this->idPrefix = $server['idprefix'];
        $this->online = boolval($server['online']);
        $this->players = intval($server['players']);
        $this->queue = intval($server['queue']);
        $this->maxPlayers = intval($server['maxplayers']);
        $this->displayOrder = intval($server['displayorder']);
        $this->speedLimiter = boolval($server['speedlimiter']);
        $this->collisions = boolval($server['collisions']);
        $this->carsForPlayers = boolval($server['carsforplayers']);
        $this->policeCarsForPlayers = boolval($server['policecarsforplayers']);
        $this->afkEnabled = boolval($server['afkenabled']);
        $this->event = boolval($server['event']);
        $this->specialEvent = boolval($server['specialEvent']);
        $this->promods = boolval($server['promods']);
        $this->syncDelay = intval($server['syncdelay']);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getGame(): string
    {
        return $this->game;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getShortName(): string
    {
        return $this->shortName;
    }

    /**
     * @return string|null
     */
    public function getIdPrefix(): ?string
    {
        return $this->idPrefix;
    }

    /**
     * @return bool
     */
    public function isOnline(): bool
    {
        return $this->online;
    }

    /**
     * @return int
     */
    public function getPlayers(): int
    {
        return $this->players;
    }

    /**
     * @return int
     */
    public function getQueue(): int
    {
        return $this->queue;
    }

    /**
     * @return int
     */
    public function getMaxPlayers(): int
    {
        return $this->maxPlayers;
    }

    /**
     * @return int
     */
    public function getDisplayOrder(): int
    {
        return $this->displayOrder;
    }

    /**
     * @return bool
     */
    public function hasSpeedLimit(): bool
    {
        return $this->speedLimiter;
    }

    /**
     * @return bool
     */
    public function hasCollisions(): bool
    {
        return $this->collisions;
    }

    /**
     * @return bool
     */
    public function canPlayersHaveCars(): bool
    {
        return $this->carsForPlayers;
    }

    /**
     * @return bool
     */
    public function canPlayersHavePoliceCars(): bool
    {
        return $this->policeCarsForPlayers;
    }

    /**
     * @return bool
     */
    public function isAfkEnabled(): bool
    {
        return $this->afkEnabled;
    }

    /**
     * @return bool
     */
    public function isEvent(): bool
    {
        return $this->event;
    }

    /**
     * @return bool
     */
    public function isSpecialEvent(): bool
    {
        return $this->specialEvent;
    }

    /**
     * @return bool
     */
    public function hasPromods(): bool
    {
        return $this->promods;
    }

    /**
     * @return bool
     */
    public function hasSyncDelay(): bool
    {
        return $this->syncDelay;
    }
}
