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
    const TEST_ACCOUNT = 585204;

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
        $player = $this->client->player(self::TEST_ACCOUNT);

        $this->assertEquals($player->getName(), 'tuxytestaccount');
        $this->assertEquals($player->getGroupID(), 1);
        $this->assertEquals($player->getGroupName(), 'Player');

        $this->assertInstanceOf(PlayerModel::class, $player);
    }

    /**
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function testPlayerBans(): void
    {
        $bans = $this->client->bans(self::TEST_ACCOUNT);

        if (count($bans->getBans()) > 0) {
            $this->assertTrue(is_string($bans->getBans()[0]->getCreated()));
            $this->assertTrue(is_string($bans->getBans()[0]->getExpires()));
            $this->assertTrue(is_string($bans->getBans()[0]->getReason()));

            $this->assertInstanceOf(BanModel::class, $bans[0]);
        } else {
            $this->assertEquals($bans->getBans(), []);
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

        $this->assertEquals($servers->getServers()[0]->getName(), 'Europe 1 [Simulation]');
    }

    /**
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function testVersion(): void
    {
        $version = $this->client->version();

        $this->assertNotEmpty($version->getVersion()->human);
        $this->assertNotEmpty($version->getVersion()->stage);
        $this->assertNotEmpty($version->getVersion()->nummeric);

        $this->assertNotEmpty($version->getChecksum()->atsmp->dll);
        $this->assertNotEmpty($version->getChecksum()->atsmp->adb);
        $this->assertNotEmpty($version->getChecksum()->ets2mp->dll);
        $this->assertNotEmpty($version->getChecksum()->ets2mp->adb);

        $this->assertInstanceOf(Carbon::class, $version->getReleased());

        $this->assertNotEmpty($version->getSupport()->ets2);
        $this->assertNotEmpty($version->getSupport()->ats);
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testGameTime(): void
    {
        $time = $this->client->gameTime();

        $this->assertNotEmpty($time);

        $this->assertInstanceOf(Carbon::class, $time->getTime());

        $this->assertInstanceOf(GameTimeModel::class, $time);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\APIErrorException
     */
    public function testRules(): void
    {
        $rules = $this->client->rules();

        $this->assertTrue(is_string($rules->getRules()));
        $this->assertTrue(is_int($rules->getRevision()));

        $this->assertInstanceOf(RulesModel::class, $rules);
    }
}
