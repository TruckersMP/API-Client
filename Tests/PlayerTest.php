<?php

namespace TruckersMP\Tests\API;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use TruckersMP\Client;
use TruckersMP\Models\PlayerModel;

class PlayerTest extends TestCase
{
    const TEST_ACCOUNT = 28159;

    /**
     * @var \TruckersMP\Client
     */
    protected $client;

    /**
     * @var PlayerModel
     */
    protected $player;

    /**
     * Create a new PlayerTest instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();
        $this->player = $this->client->player(self::TEST_ACCOUNT);
    }

    /** @test */
    public function testWeCanGetThePlayer()
    {
        $this->assertInstanceOf(PlayerModel::class, $this->player);
    }

    /** @test */
    public function testWeCanGetThePlayerId()
    {
        $this->assertIsInt($this->player->getId());
    }

    /** @test */
    public function testWeCanGetThePlayerName()
    {
        $this->assertIsString($this->player->getName());
    }

    /** @test */
    public function testWeCanGetThePlayersAvatar()
    {
        $this->assertIsString($this->player->getAvatar());
    }

    /** @test */
    public function testWeCanGetThePlayerJoinDate()
    {
        $this->assertInstanceOf(Carbon::class, $this->player->getJoinDate());
    }

    /** @test */
    public function testWeCanGetThePlayersSteamId()
    {
        $this->assertIsString($this->player->getSteamID64());
    }

    /** @test */
    public function testWeCanGetThePlayersGroupName()
    {
        $this->assertIsString($this->player->getGroupName());
    }

    /** @test */
    public function testWeCanGetThePlayersGroupID()
    {
        $this->assertIsInt($this->player->getGroupID());
    }

    /** @test */
    public function testWeCanGetIfThePlayerIsBanned()
    {
        $this->assertIsBool($this->player->isBanned());
    }

    /** @test */
    public function testWeCanGetWhenThePlayerIsBannedTill()
    {
        $this->assertInstanceOf(Carbon::class, $this->player->isBannedUntil());
    }

    /** @test */
    public function testWeCanGetIfThePlayersBansArePublic()
    {
        $this->assertIsBool($this->player->hasBansHidden());
    }

    /** @test */
    public function testIfTheUserIsAdmin()
    {
        $this->assertIsBool($this->player->isAdmin());
    }
}
