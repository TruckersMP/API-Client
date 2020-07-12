<?php

namespace Tests\Unit;

use Tests\TestCase;
use TruckersMP\APIClient\Collections\ServerCollection;
use TruckersMP\APIClient\Models\Server;

class ServerTest extends TestCase
{
    /** @test */
    public function it_can_get_all_the_servers()
    {
        $servers = $this->servers();

        $this->assertInstanceOf(ServerCollection::class, $servers);

        if ($servers->count() > 0) {
            $this->assertInstanceOf(Server::class, $servers[0]);
        }
    }

    /** @test */
    public function it_has_an_id()
    {
        $server = $this->servers()[0];

        $this->assertIsInt($server->getId());
    }

    /** @test */
    public function it_has_a_game()
    {
        $server = $this->servers()[0];

        $this->assertIsString($server->getGame());
    }

    /** @test */
    public function it_has_an_ip()
    {
        $server = $this->servers()[0];

        $this->assertIsString($server->getIp());
    }

    /** @test */
    public function it_has_a_port()
    {
        $server = $this->servers()[0];

        $this->assertIsInt($server->getPort());
    }

    /** @test */
    public function it_has_a_name()
    {
        $server = $this->servers()[0];

        $this->assertIsString($server->getName());
    }

    /** @test */
    public function it_has_a_short_name()
    {
        $server = $this->servers()[0];

        $this->assertIsString($server->getShortName());
    }

    /** @test */
    public function it_has_an_id_prefix()
    {
        $server = $this->servers()[0];

        if ($server->getIdPrefix() !== null) {
            $this->assertIsString($server->getIdPrefix());
        } else {
            $this->assertNull($server->getIdPrefix());
        }
    }

    /** @test */
    public function it_has_an_online_state()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->isOnline());
    }

    /** @test */
    public function it_has_players()
    {
        $server = $this->servers()[0];

        $this->assertIsInt($server->getPlayers());
    }

    /** @test */
    public function it_has_a_queue()
    {
        $server = $this->servers()[0];

        $this->assertIsInt($server->getQueue());
    }

    /** @test */
    public function it_has_max_players()
    {
        $server = $this->servers()[0];

        $this->assertIsInt($server->getMaxPlayers());
    }

    /** @test */
    public function it_has_a_display_order()
    {
        $server = $this->servers()[0];

        $this->assertIsInt($server->getDisplayOrder());
    }

    /** @test */
    public function if_it_has_a_speed_limit()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->hasSpeedLimit());
    }

    /** @test */
    public function if_it_has_collisions()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->hasCollisions());
    }

    /** @test */
    public function if_players_can_have_cars()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->canPlayersHaveCars());
    }

    /** @test */
    public function if_players_can_have_police_cars()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->canPlayersHavePoliceCars());
    }

    /** @test */
    public function if_it_has_afk_kick_enabled()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->isAfkEnabled());
    }

    /** @test */
    public function if_it_has_an_event_server()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->isEvent());
    }

    /** @test */
    public function if_it_is_a_special_event_server()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->isSpecialEvent());
    }

    /** @test */
    public function it_has_promods()
    {
        $server = $this->servers()[0];

        $this->assertIsBool($server->hasPromods());
    }

    /** @test */
    public function it_has_sync_delay()
    {
        $server = $this->servers()[0];

        $this->assertIsInt($server->getSyncDelay());
    }
}
