<?php

namespace Tests\Unit\Requests;

use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\Player;

class PlayerRequestTest extends TestCase
{
    use MockAPIRequests;

    public function testItCanGetAPlayer()
    {
        $this->mockRequest('player.json', 'player/1287455');

        $player = $this->client->player(1287455)->get();

        $this->assertInstanceOf(Player::class, $player);
    }
}
