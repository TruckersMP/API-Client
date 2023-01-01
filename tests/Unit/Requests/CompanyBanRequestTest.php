<?php

namespace Tests\Unit\Requests;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\CompanyMember;

class CompanyBanRequestTest extends TestCase
{
    use MockAPIRequests;

    public function testItCanGetCompanyBans()
    {
        $this->mockRequest('company.ban.json', 'vtc/22/members/banned');

        $members = $this->client->company(22)->members()->bans()->get();

        $this->assertInstanceOf(Collection::class, $members);
        $this->assertCount(1, $members);

        $this->assertInstanceOf(CompanyMember::class, $members->first());
    }
}
