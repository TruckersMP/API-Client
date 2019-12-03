<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\APIClient\Models\GameTime;

class GameTimeTest extends TestCase
{
    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\APIClient\Exceptions\PageNotFoundException
     * @throws \TruckersMP\APIClient\Exceptions\RequestException
     */
    public function testWeCanGetTheGameTime()
    {
        $time = $this->gameTime();

        $this->assertInstanceOf(GameTime::class, $time);
        $this->assertInstanceOf(Carbon::class, $time->getTime());
    }
}
