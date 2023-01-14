<?php

namespace Tests\Unit;

use Illuminate\Support\Collection;
use Tests\TestCase;
use TruckersMP\APIClient\Models\CompanyMember;

class CompanyBanTest extends TestCase
{
    /**
     * The ID of the company to use in the tests.
     */
    private const TEST_COMPANY = 2;

    /** @test */
    public function it_can_get_all_the_bans()
    {
        $bans = $this->companyBans(self::TEST_COMPANY);

        $this->assertInstanceOf(Collection::class, $bans);

        if ($bans->count() > 0) {
            $ban = $bans[0];

            $this->assertInstanceOf(CompanyMember::class, $ban);
        }
    }
}
