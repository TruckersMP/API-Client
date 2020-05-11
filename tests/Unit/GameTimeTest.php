<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException;
use Psr\Http\Client\ClientExceptionInterface;
use Tests\TestCase;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
use TruckersMP\APIClient\Models\GameTime;

class GameTimeTest extends TestCase
{
    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetTheGameTime()
    {
        $time = $this->gameTime();

        $this->assertInstanceOf(GameTime::class, $time);
        $this->assertInstanceOf(Carbon::class, $time->getTime());
    }
}
