<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\Models\Player;

class PlayerTest extends TestCase
{
    /**
     * The ID of the player to use in the tests.
     */
    private const TEST_ACCOUNT = 6818;

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testWeCanGetThePlayer()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Player::class, $player);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasAnId()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getId());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasAName()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getName());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasAnAvatar()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getAvatar());

        if ($player->getSmallAvatar() !== null) {
            $this->assertIsString($player->getSmallAvatar());
        }
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasAJoinDate()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Carbon::class, $player->getJoinDate());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasASteamId()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getSteamID64());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasAGroupName()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getGroupName());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasAGroupId()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getGroupId());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testIfItIsBanned()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->isBanned());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasABannedUntilDate()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Carbon::class, $player->getBannedUntilDate());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testIfBansAreHidden()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->hasBansHidden());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasIfAdmin()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->isAdmin());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasACompanyId()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getCompanyId());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasACompanyName()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getCompanyName());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasACompanyTag()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getCompanyTag());
    }

    public function testIfInACompany()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->isInCompany());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasAMemberId()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getCompanyMemberId());
    }
}
