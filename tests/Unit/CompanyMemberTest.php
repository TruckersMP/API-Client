<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\Collections\CompanyCollection;
use TruckersMP\Collections\MemberCollection;
use TruckersMP\Models\CompanyMember;
use TruckersMP\Models\CompanyMemberIndex;

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

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testWeCanAllTheMembers()
    {
        $members = $this->companyMembers(self::TEST_COMPANY);

        $this->assertInstanceOf(CompanyMemberIndex::class, $members);

        $this->assertInstanceOf(MemberCollection::class, $members->getMembers());
        $this->assertIsInt($members->getCount());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testWeCanGetAMember()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertInstanceOf(CompanyMember::class, $member);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testTheMemberHasAnId()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getId());
        $this->assertIsInt($member->getId());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testTheMemberHasAUserId()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getUserId());
        $this->assertIsInt($member->getUserId());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testTheMemberHasAUsername()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getUsername());
        $this->assertIsString($member->getUsername());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testTheMemberHasASteamId()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getSteamId());
        $this->assertIsString($member->getSteamId());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testTheMemberHasARoleId()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getRoleId());
        $this->assertIsInt($member->getRoleId());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testTheMemberHasARole()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getRole());
        $this->assertIsString($member->getRole());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testTheMemberHasAJoinDate()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getJoinDate());
        $this->assertInstanceOf(Carbon::class, $member->getJoinDate());
    }
}
