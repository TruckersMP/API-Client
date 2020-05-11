<?php

namespace Tests\Unit;

use Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException;
use Psr\Http\Client\ClientExceptionInterface;
use Tests\TestCase;
use TruckersMP\APIClient\Collections\ServerCollection;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
use TruckersMP\APIClient\Models\Server;

class ServerTest extends TestCase
{
    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetAllTheServers()
    {
        $servers = $this->servers();

        $this->assertInstanceOf(ServerCollection::class, $servers);

        if ($servers->count() > 0) {
            $this->assertInstanceOf(Server::class, $servers[0]);
        }
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnId()
    {
        $server = $this->servers()[0];

        $this->assertIsInt($server->getId());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAGame()
    {
        $server = $this->servers()[0];

        $this->assertIsString($server->getGame());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnIp()
    {
        $server = $this->servers()[0];

        $this->assertIsString($server->getIp());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAPort()
    {
        $server = $this->servers()[0];

        $this->assertIsInt($server->getPort());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAName()
    {
        $server = $this->servers()[0];

        $this->assertIsString($server->getName());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAShortName()
    {
        $server = $this->servers()[0];

        $this->assertIsString($server->getShortName());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnIdPrefix()
    {
        $server = $this->servers()[0];

        if ($server->getIdPrefix() !== null) {
            $this->assertIsString($server->getIdPrefix());
        } else {
            $this->assertNull($server->getIdPrefix());
        }
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnOnlineState()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->isOnline());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasPlayers()
    {
        $server = $this->servers()[0];

        $this->assertIsInt($server->getPlayers());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAQueue()
    {
        $server = $this->servers()[0];

        $this->assertIsInt($server->getQueue());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasMaxPlayers()
    {
        $server = $this->servers()[0];

        $this->assertIsInt($server->getMaxPlayers());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasADisplayOrder()
    {
        $server = $this->servers()[0];

        $this->assertIsInt($server->getDisplayOrder());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasASpeedLimit()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->hasSpeedLimit());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasCollisions()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->hasCollisions());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasCarsForPlayers()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->canPlayersHaveCars());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasPoliceCarsForPlayers()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->canPlayersHavePoliceCars());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAfkEnable()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->isAfkEnabled());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnEvent()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->isEvent());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasASpecialEvent()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->isSpecialEvent());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasPromods()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->hasPromods());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasSyncDelay()
    {
        $server = $this->servers()[0];

        $this->assertIsInt($server->getSyncDelay());
    }
}
