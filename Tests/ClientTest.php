<?php

namespace TruckersMP\Tests\API;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use TruckersMP\Client;
use TruckersMP\Models\BanModel;
use TruckersMP\Models\BansModel;
use TruckersMP\Models\GameTimeModel;
use TruckersMP\Models\PlayerModel;
use TruckersMP\Models\RulesModel;

class ClientTest extends TestCase
{
    /**
     * @var int
     */
    protected $testAccount = 585204;

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

        $this->assertEquals($player->name, 'tuxytestaccount');
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
        /**
         * @var $bans BanModel[]
         */
        $bans = $this->client->bans($this->testAccount);

        if (count($bans->bans) > 0) {
            $this->assertTrue(is_string($bans[0]->created));
            $this->assertTrue(is_string($bans[0]->expires));
            $this->assertTrue(is_string($bans[0]->reason));

            $this->assertInstanceOf(BanModel::class, $bans[0]);
        } else {
            $this->assertEquals($bans->bans, []);
        }

        $this->assertInstanceOf(BansModel::class, $bans);
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

        $this->assertInstanceOf(Carbon::class, $time->time);

        $this->assertInstanceOf(GameTimeModel::class, $time);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\APIErrorException
     */
    public function testRules(): void
    {
        $rules = $this->client->rules();

        $this->assertTrue(is_string($rules->rules));
        $this->assertTrue(is_int($rules->revision));

        $this->assertInstanceOf(RulesModel::class, $rules);
    }
}
