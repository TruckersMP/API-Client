<?php

namespace TruckersMP\Tests\API;

use PHPUnit\Framework\TestCase;
use TruckersMP\Client;
use TruckersMP\Models\ServerModel;
use TruckersMP\Models\ServersModel;

class ServersTest extends TestCase
{
    /**
     * @var \TruckersMP\Client
     */
    protected $client;

    /**
     * Create a new ServersTest instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testWeCanGetAllTheServers()
    {
        $servers = $this->client->servers();

        $this->assertInstanceOf(ServersModel::class, $servers);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testWeCanGetTheServerDetails()
    {
        $servers = $this->client->servers();
        $server = $servers->getServers()[0];

        $this->assertInstanceOf(ServerModel::class, $server);

        $this->assertIsInt($server->getId());
        $this->assertIsString($server->getGame());

        $this->assertIsString($server->getIp());
        $this->assertIsInt($server->getPort());

        $this->assertIsString($server->getName());
        $this->assertIsString($server->getShortName());

        $this->assertIsBool($server->isOnline());
        $this->assertIsInt($server->getPlayers());
        $this->assertIsInt($server->getQueue());
        $this->assertIsInt($server->getMaxPlayers());

        $this->assertIsBool($server->hasSpeedLimit());
        $this->assertIsBool($server->hasCollisions());
        $this->assertIsBool($server->canPlayersHaveCars());
        $this->assertIsBool($server->canPlayersHavePoliceCars());
        $this->assertIsBool($server->isAfkEnabled());

        $this->assertIsBool($server->hasSyncDelay());
    }
}
