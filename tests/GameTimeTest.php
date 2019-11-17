<?php

namespace TruckersMP\Tests\tests;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use TruckersMP\Client;
use TruckersMP\Models\GameTimeModel;

class GameTimeTest extends TestCase
{
    /**
     * @var \TruckersMP\Client
     */
    protected $client;

    /**
     * Create a new GameTimeTest instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testWeCanGetTheGameTime()
    {
        $time = $this->client->gameTime();

        $this->assertNotEmpty($time);

        $this->assertInstanceOf(Carbon::class, $time->getTime());

        $this->assertInstanceOf(GameTimeModel::class, $time);
    }
}
