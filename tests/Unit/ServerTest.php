<?php

namespace Tests\Unit;

use Tests\TestCase;
use TruckersMP\Collections\ServerCollection;
use TruckersMP\Models\Server;

class ServerTest extends TestCase
{
    /**
     * @throws \Http\Client\Exception
     */
    public function testWeCanGetAllServers()
    {
        $servers = $this->client->servers();

        $this->assertInstanceOf(ServerCollection::class, $servers);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testWeCanGetASpecificServer()
    {
        $servers = $this->client->servers();

        if (count($servers->getServers()) > 0) {
            $server = $servers->getServers()[0];

            $this->assertInstanceOf(Server::class, $server);
        } else {
            $this->assertCount(0, $servers->getServers());
        }
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasAnId()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsInt($server->getId());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasAGame()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsString($server->getGame());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasAnIp()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsString($server->getIp());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasAPort()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsInt($server->getPort());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasAName()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsString($server->getName());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasAShortName()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsString($server->getShortName());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasAnIdPrefix()
    {
        $server = $this->client->servers()->getServers()[0];

        if ($server->getIdPrefix() != null) {
            $this->assertIsString($server->getIdPrefix());
        } else {
            $this->assertNull($server->getIdPrefix());
        }
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasAnOnlineState()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsBool($server->isOnline());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasPlayers()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsInt($server->getPlayers());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasAQueue()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsInt($server->getQueue());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasMaxPlayers()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsInt($server->getMaxPlayers());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasADisplayOrder()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsInt($server->getDisplayOrder());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasASpeedLimit()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsBool($server->hasSpeedLimit());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasCollisions()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsBool($server->hasCollisions());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasCarsForPlayers()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsBool($server->canPlayersHaveCars());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasPoliceCarsForPlayers()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsBool($server->canPlayersHavePoliceCars());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasAfkEnable()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsBool($server->isAfkEnabled());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasAnEvent()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsBool($server->isEvent());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasASpecialEvent()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsBool($server->isSpecialEvent());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasPromods()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsBool($server->hasPromods());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testItHasSyncDelay()
    {
        $server = $this->client->servers()->getServers()[0];

        $this->assertIsBool($server->hasSyncDelay());
    }
}
