<?php

namespace Tests\Unit\Models;

use Carbon\Carbon;
use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\GameTime;

class GameTimeTest extends TestCase
{
    use MockModelData;

    /**
     * A GameTime model instance filled with mocked data.
     *
     * @var GameTime
     */
    private GameTime $gameTime;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('game_time.json');

        $this->gameTime = new GameTime($this->client, $data);
    }

    public function testItHasADate()
    {
        $time = $this->gameTime->getTime();

        $this->assertInstanceOf(Carbon::class, $time);

        $this->assertSame(35, $time->minute);
        $this->assertSame(17, $time->hour);

        $this->assertSame(26, $time->day);
        $this->assertSame(10, $time->month);
    }
}
