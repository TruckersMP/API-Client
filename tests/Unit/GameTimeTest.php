<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\Models\GameTime;

class GameTimeTest extends TestCase
{
    /**
     * @throws \Http\Client\Exception
     */
    public function testWeCanGetTheGameTime()
    {
        $time = $this->client->gameTime();

        $this->assertInstanceOf(GameTime::class, $time);
        $this->assertInstanceOf(Carbon::class, $time->getTime());
    }
}
