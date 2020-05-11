<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException;
use Psr\Http\Client\ClientExceptionInterface;
use Tests\TestCase;
use TruckersMP\APIClient\Collections\Company\MemberCollection;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
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

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanAllTheMembers()
    {
        $members = $this->companyMembers(self::TEST_COMPANY);

        $this->assertInstanceOf(CompanyMemberIndex::class, $members);

        $this->assertInstanceOf(MemberCollection::class, $members->getMembers());
        $this->assertIsInt($members->getCount());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetAMember()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertInstanceOf(CompanyMember::class, $member);
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testTheMemberHasAnId()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getId());
        $this->assertIsInt($member->getId());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testTheMemberHasAUserId()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getUserId());
        $this->assertIsInt($member->getUserId());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testTheMemberHasAUsername()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getUsername());
        $this->assertIsString($member->getUsername());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testTheMemberHasASteamId()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getSteamId());
        $this->assertIsString($member->getSteamId());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testTheMemberHasARoleId()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getRoleId());
        $this->assertIsInt($member->getRoleId());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testTheMemberHasARole()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getRole());
        $this->assertIsString($member->getRole());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testTheMemberHasAJoinDate()
    {
        $member = $this->companyMember(self::TEST_COMPANY, self::TEST_MEMBER);

        $this->assertNotEmpty($member->getJoinDate());
        $this->assertInstanceOf(Carbon::class, $member->getJoinDate());
    }
}
