<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\APIClient\Collections\Company\RoleCollection;
use TruckersMP\APIClient\Models\CompanyRole;

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

    /** @test */
    public function it_can_get_all_the_roles()
    {
        $roles = $this->companyRoles(self::TEST_COMPANY);

        $this->assertInstanceOf(RoleCollection::class, $roles);

        if ($roles->count() > 0) {
            $role = $roles[0];

            $this->assertInstanceOf(CompanyRole::class, $role);
        }
    }

    /** @test */
    public function it_can_get_a_specific_role()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertInstanceOf(CompanyRole::class, $role);
    }

    /** @test */
    public function it_has_an_id()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertIsInt($role->getId());
    }

    /** @test */
    public function it_has_a_name()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertIsString($role->getName());
    }

    /** @test */
    public function it_has_an_order()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertIsInt($role->getOrder());
    }

    /** @test */
    public function if_it_is_an_owner()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertIsBool($role->isOwner());
    }

    /** @test */
    public function it_has_a_created_at_date()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertInstanceOf(Carbon::class, $role->getCreatedAt());
    }

    /** @test */
    public function it_has_an_updated_at_date()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertInstanceOf(Carbon::class, $role->getUpdatedAt());
    }
}
