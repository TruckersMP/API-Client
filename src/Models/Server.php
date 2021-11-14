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
     * The map ID given to the server used by ETS2Map.
     *
     * @var int
     */
    protected $mapId;

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
     * @var int
     */
    protected $syncDelay;

    /**
     * Create a new Server instance.
     *
     * @param  array  $server
     * @return void
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
        $this->mapId = intval($server['mapid']);
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
     * Get the ID of the server.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the game which the server is for.
     *
     * @return string
     */
    public function getGame(): string
    {
        return $this->game;
    }

    /**
     * Get the server IP address.
     *
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * Get the port which the server is running on.
     *
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * Get the name of the server.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the short name of the server.
     *
     * @return string
     */
    public function getShortName(): string
    {
        return $this->shortName;
    }

    /**
     * Get the server prefix.
     *
     * @return string|null
     */
    public function getIdPrefix(): ?string
    {
        return $this->idPrefix;
    }

    /**
     * Check if the server is online.
     *
     * @return bool
     */
    public function isOnline(): bool
    {
        return $this->online;
    }

    /**
     * Get the number of players connected to the server.
     *
     * @return int
     */
    public function getPlayers(): int
    {
        return $this->players;
    }

    /**
     * Get the number of players in the server queue.
     *
     * @return int
     */
    public function getQueue(): int
    {
        return $this->queue;
    }

    /**
     * Get the maximum players allowed on the server.
     *
     * @return int
     */
    public function getMaxPlayers(): int
    {
        return $this->maxPlayers;
    }

    /**
     * Get the map ID given to the server used by ETS2Map.
     *
     * @return int
     */
    public function getMapId(): int
    {
        return $this->mapId;
    }

    /**
     * Get the order ID of the server. This determines which order to display the servers in.
     * The lowest number will show first.
     *
     * @return int
     */
    public function getDisplayOrder(): int
    {
        return $this->displayOrder;
    }

    /**
     * Check if the server has a speed limit.
     *
     * @return bool
     */
    public function hasSpeedLimit(): bool
    {
        return $this->speedLimiter;
    }

    /**
     * Check if the server has collisions enabled.
     *
     * @return bool
     */
    public function hasCollisions(): bool
    {
        return $this->collisions;
    }

    /**
     * Check if the player can driver cars.
     *
     * @return bool
     */
    public function canPlayersHaveCars(): bool
    {
        return $this->carsForPlayers;
    }

    /**
     * Check if the player can driver police cars.
     *
     * @return bool
     */
    public function canPlayersHavePoliceCars(): bool
    {
        return $this->policeCarsForPlayers;
    }

    /**
     * Check if AFK kick is enabled on the server.
     *
     * @return bool
     */
    public function isAfkEnabled(): bool
    {
        return $this->afkEnabled;
    }

    /**
     * Check if the server is an event server.
     *
     * @return bool
     */
    public function isEvent(): bool
    {
        return $this->event;
    }

    /**
     * Check if the server is a special event server.
     *
     * @return bool
     */
    public function isSpecialEvent(): bool
    {
        return $this->specialEvent;
    }

    /**
     * Check if the server has promods enabled.
     *
     * @return bool
     */
    public function hasPromods(): bool
    {
        return $this->promods;
    }

    /**
     * Get the sync delay/tick rate.
     *
     * @return int
     */
    public function getSyncDelay(): int
    {
        return $this->syncDelay;
    }
}
