<?php

namespace Tests\Unit\Requests;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\CompanyMember;
use TruckersMP\APIClient\Models\CompanyMemberIndex;

class CompanyMemberRequestTest extends TestCase
{
    use MockAPIRequests;

    public function testItCanGetAllCompanyMembers()
    {
        $this->mockRequest('company.member.index.json', 'vtc/666/members');

        $index = $this->client->company(666)->members()->get();

        $this->assertInstanceOf(CompanyMemberIndex::class, $index);

        $members = $index->getMembers();

        $this->assertInstanceOf(Collection::class, $members);
        $this->assertCount(1, $members);

        $this->assertInstanceOf(CompanyMember::class, $members->first());
    }

    public function testItCanGetASpecificCompanyMember()
    {
        $this->mockRequest('company.member.json', 'vtc/666/member/123');

        $member = $this->client->company(666)->member(123)->get();

        $this->assertInstanceOf(CompanyMember::class, $member);
    }
}
