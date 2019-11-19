<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\Collections\RoleCollection;
use TruckersMP\Models\CompanyRole;

class CompanyRoleTest extends TestCase
{
    /**
     * The ID of the company to use in the tests.
     */
    private const TEST_COMPANY = 1;

    /**
     * The ID of the role to use in the tests.
     */
    private const TEST_ROLE = 1;

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testWeCanGetAllTheRoles()
    {
        $roles = $this->companyRoles(self::TEST_COMPANY);

        $this->assertInstanceOf(RoleCollection::class, $roles);

        if ($roles->count() > 0) {
            $role = $roles[0];

            $this->assertInstanceOf(CompanyRole::class, $role);
        }
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testWeCanGetARole()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertInstanceOf(CompanyRole::class, $role);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAnId()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertIsInt($role->getId());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAName()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertIsString($role->getName());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAnOrder()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertIsInt($role->getOrder());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testIfItIsAnOwner()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertIsBool($role->isOwner());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasACreatedAtDate()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertInstanceOf(Carbon::class, $role->getCreatedAt());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAnUpdatedAtDate()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertInstanceOf(Carbon::class, $role->getUpdatedAt());
    }
}
