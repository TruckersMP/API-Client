<?php

namespace TruckersMP\Tests\API;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use TruckersMP\Client;
use TruckersMP\Models\BanModel;
use TruckersMP\Models\BansModel;
use TruckersMP\Models\PlayerModel;

class ClientTest extends TestCase
{
    /**
     * @var int
     */
    protected $testAccount = 162950;

    /**
     * @var Client
     */
    protected $client;

    /**
     * ClientTest constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();
    }

    /**
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function testPlayer(): void
    {
        $player = $this->client->player($this->testAccount);

        $this->assertEquals($player->name, 'caff!!!');
        $this->assertEquals($player->groupID, 1);
        $this->assertEquals($player->groupName, 'Player');

        $this->assertInstanceOf(PlayerModel::class, $player);
    }

    /**
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function testPlayerBans(): void
    {
        $bans = $this->client->bans($this->testAccount);

        $this->assertEquals($bans[0]->expires, '2016-05-04 20:40:00');
        $this->assertEquals($bans[0]->created, '2016-05-03 20:41:40');
        $this->assertEquals($bans[0]->reason, 'Car carrying trailer - http://i.imgur.com/9MZ7DzC.jpg');

        $this->assertInstanceOf(BansModel::class, $bans);
        $this->assertInstanceOf(BanModel::class, $bans[0]);
    }

    /**
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function testServers(): void
    {
        $servers = $this->client->servers();

        $this->assertEquals($servers[0]->name, 'Europe 1 [Simulation]');
    }

    /**
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function testVersion(): void
    {
        $version = $this->client->version();

        $this->assertNotEmpty($version->version->human);
        $this->assertNotEmpty($version->version->stage);
        $this->assertNotEmpty($version->version->nummeric);

        $this->assertNotEmpty($version->checksum->atsmp->dll);
        $this->assertNotEmpty($version->checksum->atsmp->adb);
        $this->assertNotEmpty($version->checksum->ets2mp->dll);
        $this->assertNotEmpty($version->checksum->ets2mp->adb);

        $this->assertInstanceOf(Carbon::class, $version->released);

        $this->assertNotEmpty($version->support->ets2);
        $this->assertNotEmpty($version->support->ats);
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testGameTime(): void
    {
        $time = $this->client->gameTime();

        $this->assertNotEmpty($time);
    }
}
