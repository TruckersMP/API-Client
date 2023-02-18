<?php

namespace TruckersMP\APIClient\Models;

use TruckersMP\APIClient\Client;

class Server extends Model
{
    /**
     * The ID given to the server.
     *
     * @var int
     */
    protected int $id;

    /**
     * What game the server is for.
     *
     * @var string
     */
    protected string $game;

    /**
     * The server ip address.
     *
     * @var string
     */
    protected string $ip;

    /**
     * The port that the server runs on.
     *
     * @var int
     */
    protected int $port;

    /**
     * The name of the server.
     *
     * @var string
     */
    protected string $name;

    /**
     * The short name for the server.
     *
     * @var string
     */
    protected string $shortName;

    /**
     * Shown in-game in front of a player's ID.
     *
     * @var string|null
     */
    protected ?string $idPrefix;

    /**
     * If the server is online or not.
     *
     * @var bool
     */
    protected bool $online;

    /**
     * How many players are currently on the server.
     *
     * @var int
     */
    protected int $players;

    /**
     * Amount of players waiting in the queue to join the server.
     *
     * @var int
     */
    protected int $queue;

    /**
     * The max amount of players allowed on the server at once.
     *
     * @var int
     */
    protected int $maxPlayers;

    /**
     * The map ID given to the server used by ETS2Map.
     *
     * @var int
     */
    protected int $mapId;

    /**
     * Determines the order in which servers are displayed.
     *
     * @var int
     */
    protected int $displayOrder;

    /**
     * If the speed limiter is enabled on the server (110 kmh for ETS2 and 80 mph for ATS).
     *
     * @var bool
     */
    protected bool $speedLimiter;

    /**
     * If server wide collisions is enabled.
     *
     * @var bool
     */
    protected bool $collisions;

    /**
     * If cars are enabled for players.
     *
     * @var bool
     */
    protected bool $carsForPlayers;

    /**
     * If police cars can be driven by players.
     *
     * @var bool
     */
    protected bool $policeCarsForPlayers;

    /**
     * If AFK kick is enabled for players.
     *
     * @var bool
     */
    protected bool $afkEnabled;

    /**
     * If the server is an event server.
     *
     * @var bool
     */
    protected bool $event;

    /**
     * Determine whether the server hosts special event file.
     *
     * @var bool
     */
    protected bool $specialEvent;

    /**
     * Determine whether the server hosts ProMods.
     *
     * @var bool
     */
    protected bool $promods;

    /**
     * The server tick rate.
     *
     * @var int
     */
    protected int $syncDelay;

    /**
     * Create a new Server instance.
     *
     * @param  Client  $client
     * @param  array  $server
     * @return void
     */
    public function __construct(Client $client, array $server)
    {
        parent::__construct($client, $server);

        $this->id = $this->getValue('id');
        $this->game = $this->getValue('game');
        $this->ip = $this->getValue('ip');
        $this->port = $this->getValue('port');
        $this->name = $this->getValue('name');
        $this->shortName = $this->getValue('shortname');
        $this->idPrefix = $this->getValue('idprefix');
        $this->online = $this->getValue('online');
        $this->players = $this->getValue('players');
        $this->queue = $this->getValue('queue');
        $this->maxPlayers = $this->getValue('maxplayers');
        $this->mapId = $this->getValue('mapid');
        $this->displayOrder = $this->getValue('displayorder');
        $this->syncDelay = $this->getValue('syncdelay');

        $this->speedLimiter = $this->getValue('speedlimiter', false);
        $this->collisions = $this->getValue('collisions', false);
        $this->carsForPlayers = $this->getValue('carsforplayers', false);
        $this->policeCarsForPlayers = $this->getValue('policecarsforplayers', false);
        $this->afkEnabled = $this->getValue('afkenabled', false);
        $this->event = $this->getValue('event', false);
        $this->specialEvent = $this->getValue('specialEvent', false);
        $this->promods = $this->getValue('promods', false);
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
     * Check if the server has ProMods enabled.
     *
     * @return bool
     */
    public function hasProMods(): bool
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
