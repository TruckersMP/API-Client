<?php

namespace TruckersMP\Types;

class Server
{
    /**
     * Game server ID.
     *
     * @var int
     */
    public $id;

    /**
     * Game.
     *
     * @var string
     */
    public $game;

    /**
     * IP or Hostname of server.
     *
     * @var string
     */
    public $ip;

    /**
     * Port.
     *
     * @var int
     */
    public $port;

    /**
     * Game server name.
     *
     * @var string
     */
    public $name;

    /**
     * Game server short name.
     *
     * @var string
     */
    public $shortName;

    /**
     * Online status.
     *
     * @var bool
     */
    public $online;

    /**
     * Current player count.
     *
     * @var int
     */
    public $players;

    /**
     * Current queue count.
     *
     * @var int
     */
    public $queue;

    /**
     * Max player count.
     *
     * @var int
     */
    public $maxPlayers;

    /**
     * Speed limiter.
     *
     * @var bool
     */
    public $speedLimiter;

    /**
     * Collisions.
     *
     * @var bool
     */
    public $collisions;

    /**
     * Will cars be available for all players.
     *
     * @var bool
     */
    public $carsForPlayers;

    /**
     * Will police cars be available for all players.
     *
     * @var bool
     */
    public $policeCarsForPlayers;

    /**
     * "Away from keyboard" status.
     *
     * @var bool
     */
    public $afkEnabled;

    /**
     * Sync delay (tick rate).
     *
     * @var bool
     */
    public $syncDelay;

    /**
     * Server constructor.
     *
     * @param $server
     */
    public function __construct($server)
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
}
