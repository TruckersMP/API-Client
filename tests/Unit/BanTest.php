<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Tests\TestCase;
use TruckersMP\APIClient\Models\Ban;

class BanTest extends TestCase
{
    /**
     * The ID of the player to use in the tests.
     */
    private const TEST_ACCOUNT = 28159;

    /** @test */
    public function it_can_get_all_bans()
    {
        $bans = $this->bans(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Collection::class, $bans);

        if (count($bans) > 0) {
            $this->assertInstanceOf(Ban::class, $bans[0]);
        }
    }

    /** @test */
    public function it_has_an_expiry_date()
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

    /** @test */
    public function it_has_created_at_date()
    {
        $bans = $this->bans(self::TEST_ACCOUNT);

        if (count($bans) > 0) {
            $ban = $bans[0];

            $this->assertInstanceOf(Carbon::class, $ban->getCreatedAt());
        } else {
            $this->assertCount(0, $bans);
        }
    }

    /** @test */
    public function it_has_active_state()
    {
        $bans = $this->bans(self::TEST_ACCOUNT);

        if (count($bans) > 0) {
            $ban = $bans[0];

            $this->assertIsBool($ban->isActive());
        } else {
            $this->assertCount(0, $bans);
        }
    }

    /** @test */
    public function it_has_a_reason()
    {
        $bans = $this->bans(self::TEST_ACCOUNT);

        if (count($bans) > 0) {
            $ban = $bans[0];

            $this->assertIsString($ban->getReason());
        } else {
            $this->assertCount(0, $bans);
        }
    }

    /** @test */
    public function it_has_the_name_of_the_admin()
    {
        $bans = $this->bans(self::TEST_ACCOUNT);

        if (count($bans) > 0) {
            $ban = $bans[0];

            $this->assertIsString($ban->getAdminName());
        } else {
            $this->assertCount(0, $bans);
        }
    }

    /** @test */
    public function it_has_the_id_of_the_admin()
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
