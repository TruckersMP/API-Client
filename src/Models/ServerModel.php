<?php

namespace TruckersMP\Models;

class ServerModel
{
    /**
     * Server ID.
     *
     * @var int
     */
    protected $id;

    /**
     * Server game.
     *
     * @var string
     */
    protected $game;

    /**
     * Server IP or Hostname.
     *
     * @var string
     */
    protected $ip;

    /**
     * Server port.
     *
     * @var int
     */
    protected $port;

    /**
     * Server name.
     *
     * @var string
     */
    protected $name;

    /**
     * Server short name.
     *
     * @var string
     */
    protected $shortName;

    /**
     * Server Online status.
     *
     * @var bool
     */
    protected $online;

    /**
     * Server current player count.
     *
     * @var int
     */
    protected $players;

    /**
     * Server current queue count.
     *
     * @var int
     */
    protected $queue;

    /**
     * Server max players.
     *
     * @var int
     */
    protected $maxPlayers;

    /**
     * Server speed limit?
     *
     * @var bool
     */
    protected $speedLimiter;

    /**
     * Server collisions?
     *
     * @var bool
     */
    protected $collisions;

    /**
     * Are cars available to all players?
     *
     * @var bool
     */
    protected $carsForPlayers;

    /**
     * Are police cars available to all players?
     *
     * @var bool
     */
    protected $policeCarsForPlayers;

    /**
     * Server "Away from keyboard" status.
     *
     * @var bool
     */
    protected $afkEnabled;

    /**
     * Server sync delay (tick rate).
     *
     * @var bool
     */
    protected $syncDelay;

    /**
     * ServerModel constructor.
     *
     * @param array $server
     */
    public function __construct(array $server)
    {
        $this->id = intval($server['id']);
        $this->game = $server['game'];
        $this->ip = $server['ip'];
        $this->port = intval($server['port']);
        $this->name = $server['name'];
        $this->shortName = $server['shortname'];
        $this->online = boolval($server['online']);
        $this->players = intval($server['players']);
        $this->queue = intval($server['queue']);
        $this->maxPlayers = intval($server['maxplayers']);
        $this->speedLimiter = boolval($server['speedlimiter']);
        $this->collisions = boolval($server['collisions']);
        $this->carsForPlayers = boolval($server['carsforplayers']);
        $this->policeCarsForPlayers = boolval($server['policecarsforplayers']);
        $this->afkEnabled = boolval($server['afkenabled']);
        $this->syncDelay = intval($server['syncdelay']);
    }

    /**
     * @return int
     */
    public function getId(): int
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
    public function hasSyncDelay(): bool
    {
        return $this->syncDelay;
    }
}
