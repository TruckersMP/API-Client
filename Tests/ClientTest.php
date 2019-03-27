<?php

namespace TruckersMP\Tests\API;

use Carbon\Carbon;
use TruckersMP\Helpers\APIClient;
use TruckersMP\Models\BanModel;
use TruckersMP\Models\BansModel;
use TruckersMP\Models\PlayerModel;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var int
     */
    protected $testAccount = 585204;

    /**
     * @var APIClient
     */
    protected $client;

    /**
     * ClientTest constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new APIClient();
    }

    /**
     * @throws \Exception
     */
    public function testPlayer(): void
    {
        $player = $this->client->player($this->testAccount);

        $this->assertEquals($player->name, 'tuxytestaccount');
        $this->assertEquals($player->groupID, 1);
        $this->assertEquals($player->groupName, 'PlayerModel');

        $this->assertInstanceOf(PlayerModel::class, $player);
    }

    /**
     * @throws \Exception
     */
    public function testPlayerBans(): void
    {
        $bans = $this->client->bans($this->testAccount);

        $this->assertEquals($bans[0]->expires, '2016-06-19 13:00:00');
        $this->assertEquals($bans[0]->created, '2016-06-19 10:08:26');
        $this->assertEquals($bans[0]->reason, 'Test ban');

        $this->assertInstanceOf(BansModel::class, $bans);
        $this->assertInstanceOf(BanModel::class, $bans[0]);
    }

    /**
     * @throws \Exception
     */
    public function testServers(): void
    {
        $servers = $this->client->servers();

        $this->assertEquals($servers[0]->name, 'Europe 1');
    }

    /**
     * @throws \Exception
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

    public function testGameTime(): void
    {
        $time = $this->client->gameTime();

        $this->assertNotEmpty($time);
    }
}
