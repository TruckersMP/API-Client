<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\APIClient\Models\GameTime;

class GameTimeTest extends TestCase
{
    /** @test */
    public function it_can_get_the_game_time()
    {
        $time = $this->gameTime();

        $this->assertInstanceOf(GameTime::class, $time);
        $this->assertInstanceOf(Carbon::class, $time->getTime());
    }
}
