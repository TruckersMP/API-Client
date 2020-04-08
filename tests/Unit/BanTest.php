<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException;
use Psr\Http\Client\ClientExceptionInterface;
use Tests\TestCase;
use TruckersMP\APIClient\Collections\BanCollection;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
use TruckersMP\APIClient\Models\Ban;

class BanTest extends TestCase
{
    /**
     * The ID of the player to use in the tests.
     */
    private const TEST_ACCOUNT = 28159;

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetAllBans()
    {
        $bans = $this->bans(self::TEST_ACCOUNT);

        $this->assertInstanceOf(BanCollection::class, $bans);

        if (count($bans) > 0) {
            $this->assertInstanceOf(Ban::class, $bans[0]);
        }
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnExpiryDate()
    {
        $bans = $this->bans(self::TEST_ACCOUNT);

        if (count($bans) > 0) {
            $ban = $bans[0];

            if ($ban->getExpirationDate() !== null) {
                $this->assertInstanceOf(Carbon::class, $ban->getExpirationDate());
            } else {
                $this->assertNull($ban->getExpirationDate());
            }
        } else {
            $this->assertCount(0, $bans);
        }
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasACreatedDate()
    {
        $bans = $this->bans(self::TEST_ACCOUNT);

        if (count($bans) > 0) {
            $ban = $bans[0];

            $this->assertInstanceOf(Carbon::class, $ban->getCreatedAt());
        } else {
            $this->assertCount(0, $bans);
        }
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
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
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
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
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
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
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
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
