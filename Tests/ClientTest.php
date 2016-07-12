<?php

namespace TruckersMP\Tests\API;

use Carbon\Carbon;
use TruckersMP\API\APIClient;

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

use TruckersMP\Types\Version;
use TruckersMP\Types\Ban;
use TruckersMP\Types\Bans;
use TruckersMP\Types\Player;
use TruckersMP\Types\Servers;
use TruckersMP\Types\Server;

class ClientTest extends \PHPUnit_Framework_TestCase
{

    private $testAccount = 585204;

    private $client;

    public function __construct()
    {
        parent::__construct();

        $config = [

        ];
        $guzzle = new GuzzleClient($config);
        $adapter = new GuzzleAdapter($guzzle);

        $this->client = new APIClient($adapter);
    }

    public function testPlayer()
    {
        $player = $this->client->player($this->testAccount); // Special test account that *should* remain static

        $this->assertEquals($player->name, 'tuxytestaccount');

        $this->assertEquals($player->groupID, 1);
        $this->assertEquals($player->groupName, 'Player');

        $this->assertInstanceOf(Player::class, $player);
    }

    public function testPlayerBans()
    {
        $bans = $this->client->bans($this->testAccount);

        $this->assertEquals($bans[0]->expires, '2016-06-19 13:00:00');
        $this->assertEquals($bans[0]->created, '2016-06-19 10:08:26');
        $this->assertEquals($bans[0]->reason, 'Test ban');

        $this->assertInstanceOf(Bans::class, $bans);
        $this->assertInstanceOf(Ban::class, $bans[0]);

    }

    public function testServers()
    {
        $servers = $this->client->servers();
        $this->assertEquals($servers[0]->name, 'Europe 1');
    }

    public function testVersion()
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

    public function testGameTime()
    {
        $time = $this->client->gameTime();

        $this->assertNotEmpty($time);
    }
}
