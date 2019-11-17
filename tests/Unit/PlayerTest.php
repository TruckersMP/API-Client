<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\Models\Player;

class PlayerTest extends TestCase
{
    const TEST_ACCOUNT = 28159;

    /**
     * @throws \Http\Client\Exception
     */
    public function testWeCanGetThePlayer()
    {
        $player = $this->client->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Player::class, $player);
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAnId()
    {
        $player = $this->client->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getId());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAName()
    {
        $player = $this->client->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getName());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAnAvatar()
    {
        $player = $this->client->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getAvatar());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAJoinDate()
    {
        $player = $this->client->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Carbon::class, $player->getJoinDate());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasASteamId()
    {
        $player = $this->client->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getSteamID64());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAGroupName()
    {
        $player = $this->client->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getGroupName());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAGroupId()
    {
        $player = $this->client->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getGroupID());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testIfItIsBanned()
    {
        $player = $this->client->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->isBanned());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasABannedUntilDate()
    {
        $player = $this->client->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Carbon::class, $player->getBannedUntilDate());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testIfBansAreHidden()
    {
        $player = $this->client->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->hasBansHidden());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasIfAdmin()
    {
        $player = $this->client->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->isAdmin());
    }
}
