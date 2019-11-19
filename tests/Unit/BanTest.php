<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\Models\Ban;

class BanTest extends TestCase
{
    /**
     * The ID of the player to use in the tests.
     */
    private const TEST_ACCOUNT = 28159;

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testWeCanGetAllBans()
    {
        $bans = $this->bans(self::TEST_ACCOUNT);

        $this->assertIsArray($bans);

        if (count($bans) > 0) {
            $this->assertInstanceOf(Ban::class, $bans[0]);
        }
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAnExpiryDate()
    {
        $bans = $this->bans(self::TEST_ACCOUNT);

        if (count($bans) > 0) {
            $ban = $bans[0];

            if ($ban->getExpirationDate() != null) {
                $this->assertInstanceOf(Carbon::class, $ban->getExpirationDate());
            } else {
                $this->assertNull($ban->getExpirationDate());
            }
        } else {
            $this->assertCount(0, $bans);
        }
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasACreatedDate()
    {
        $bans = $this->bans(self::TEST_ACCOUNT);

        if (count($bans) > 0) {
            $ban = $bans[0];

            $this->assertInstanceOf(Carbon::class, $ban->getCreatedDate());
        } else {
            $this->assertCount(0, $bans);
        }
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAnActiveState()
    {
        $bans = $this->bans(self::TEST_ACCOUNT);

        if (count($bans) > 0) {
            $ban = $bans[0];

            $this->assertIsBool($ban->isActive());
        } else {
            $this->assertCount(0, $bans);
        }
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAReason()
    {
        $bans = $this->bans(self::TEST_ACCOUNT);

        if (count($bans) > 0) {
            $ban = $bans[0];

            $this->assertIsString($ban->getReason());
        } else {
            $this->assertCount(0, $bans);
        }
    }

    /**
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \Http\Client\Exception
     */
    public function testItHasTheNameOfTheAdmin()
    {
        $bans = $this->bans(self::TEST_ACCOUNT);

        if (count($bans) > 0) {
            $ban = $bans[0];

            $this->assertIsString($ban->getAdminName());
        } else {
            $this->assertCount(0, $bans);
        }
    }

    /**
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \Http\Client\Exception
     */
    public function testItHasTheIdOfTheAdmin()
    {
        $bans = $this->bans(self::TEST_ACCOUNT);

        if (count($bans) > 0) {
            $ban = $bans[0];

            $this->assertIsInt($ban->getAdminId());
        } else {
            $this->assertCount(0, $bans);
        }
    }
}
