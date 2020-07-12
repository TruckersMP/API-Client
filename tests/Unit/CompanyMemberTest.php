<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\APIClient\Collections\Company\MemberCollection;
use TruckersMP\APIClient\Models\CompanyMember;
use TruckersMP\APIClient\Models\CompanyMemberIndex;

class CompanyMemberTest extends TestCase
{
    /**
     * The ID of the company to use in the tests.
     */
    private const TEST_COMPANY = 1;

    /**
     * The ID of the member to use in the tests.
     */
    private const TEST_MEMBER = 1579;

    /** @test */
    public function it_can_get_all_the_members()
    {
        $members = $this->companyMembers(self::TEST_COMPANY);

        $this->assertInstanceOf(CompanyMemberIndex::class, $members);

        $this->assertInstanceOf(MemberCollection::class, $members->getMembers());
        $this->assertIsInt($members->getCount());
    }

    /** @test */
    public function it_can_get_a_member()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertInstanceOf(CompanyMember::class, $member);
    }

    /** @test */
    public function it_has_an_id()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getId());
        $this->assertIsInt($member->getId());
    }

    /** @test */
    public function it_has_a_user_id()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getUserId());
        $this->assertIsInt($member->getUserId());
    }

    /** @test */
    public function it_has_a_username()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getUsername());
        $this->assertIsString($member->getUsername());
    }

    /** @test */
    public function it_has_a_steam_id()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getSteamId());
        $this->assertIsString($member->getSteamId());
    }

    /** @test */
    public function it_has_a_role_id()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getRoleId());
        $this->assertIsInt($member->getRoleId());
    }

    /** @test */
    public function it_has_a_role()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getRole());
        $this->assertIsString($member->getRole());
    }

    /** @test */
    public function it_has_a_join_date()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getJoinDate());
        $this->assertInstanceOf(Carbon::class, $member->getJoinDate());
    }
}
