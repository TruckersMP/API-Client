<?php

namespace Tests\Unit\Requests;

use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\GameTime;

class GameTimeRequestTest extends TestCase
{
    use MockAPIRequests;

    public function testItCanGetTheGameTime()
    {
        $this->mockRequest('game_time.json', 'game_time');

        $time = $this->client->gameTime()->get();

        $this->assertInstanceOf(GameTime::class, $time);
    }
}
