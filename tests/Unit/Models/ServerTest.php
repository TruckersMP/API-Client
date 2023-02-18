<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\Server;

class ServerTest extends TestCase
{
    use MockModelData;

    /**
     * A Server model instance filled with mocked data.
     *
     * @var Server
     */
    private Server $server;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('server.json');

        $this->server = new Server($this->client, $data);
    }

    public function testItHasAnId()
    {
        $this->assertSame(1, $this->server->getId());
    }

    public function testItHasAGame()
    {
        $this->assertSame('ETS2', $this->server->getGame());
    }

    public function testItHasAnIp()
    {
        $this->assertSame('127.0.0.1', $this->server->getIp());
    }

    public function testItHasAPort()
    {
        $this->assertSame(12345, $this->server->getPort());
    }

    public function testItHasAName()
    {
        $this->assertSame('Name', $this->server->getName());
    }

    public function testItHasAShortName()
    {
        $this->assertSame('SHORT', $this->server->getShortName());
    }

    public function testItHasAnIdPrefix()
    {
        $this->assertSame('TMP', $this->server->getIdPrefix());
    }

    public function testItIsOnline()
    {
        $this->assertTrue($this->server->isOnline());
    }

    public function testItHasAPlayersCount()
    {
        $this->assertSame(4321, $this->server->getPlayers());
    }

    public function testItHasAQueue()
    {
        $this->assertSame(132, $this->server->getQueue());
    }

    public function testItHasAMaxPlayersCount()
    {
        $this->assertSame(4500, $this->server->getMaxPlayers());
    }

    public function testItHasAMapId()
    {
        $this->assertSame(2, $this->server->getMapId());
    }

    public function testItHasADisplayOrder()
    {
        $this->assertSame(10, $this->server->getDisplayOrder());
    }

    public function testItHasASpeedLimit()
    {
        $this->assertTrue($this->server->hasSpeedLimit());
    }

    public function testItHasCollisionsEnabled()
    {
        $this->assertTrue($this->server->hasCollisions());
    }

    public function testItHasCarsForPlayersEnabled()
    {
        $this->assertTrue($this->server->canPlayersHaveCars());
    }

    public function testItHasPoliceCarsForPlayersDisabled()
    {
        $this->assertFalse($this->server->canPlayersHavePoliceCars());
    }

    public function testItHasTheAfkTimerEnabled()
    {
        $this->assertTrue($this->server->isAfkEnabled());
    }

    public function testItIsNotAnEventServer()
    {
        $this->assertFalse($this->server->isEvent());
        $this->assertFalse($this->server->isSpecialEvent());
    }

    public function testItDoesNotHaveProMods()
    {
        $this->assertFalse($this->server->hasProMods());
    }

    public function testItHasASyncDelay()
    {
        $this->assertSame(250, $this->server->getSyncDelay());
    }
}
