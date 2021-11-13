<?php

namespace Tests\Unit;

use Tests\TestCase;
use TruckersMP\APIClient\Collections\Company\BanCollection;
use TruckersMP\APIClient\Models\CompanyBan;

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

        $this->assertInstanceOf(BanCollection::class, $bans);

        if ($bans->count() > 0) {
            $ban = $bans[0];

            $this->assertInstanceOf(CompanyBan::class, $ban);
        }
    }
}
