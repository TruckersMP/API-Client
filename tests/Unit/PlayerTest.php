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
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testWeCanGetThePlayer()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Player::class, $player);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAnId()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getId());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAName()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getName());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAnAvatar()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getAvatar());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAJoinDate()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Carbon::class, $player->getJoinDate());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasASteamId()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getSteamID64());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAGroupName()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getGroupName());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAGroupId()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getGroupID());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testIfItIsBanned()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->isBanned());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasABannedUntilDate()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Carbon::class, $player->getBannedUntilDate());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testIfBansAreHidden()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->hasBansHidden());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasIfAdmin()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->isAdmin());
    }
}
