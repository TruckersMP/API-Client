<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException;
use Psr\Http\Client\ClientExceptionInterface;
use Tests\TestCase;
use TruckersMP\APIClient\Collections\Company\RoleCollection;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
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

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
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
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetARole()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertInstanceOf(CompanyRole::class, $role);
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnId()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertIsInt($role->getId());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAName()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertIsString($role->getName());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnOrder()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertIsInt($role->getOrder());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testIfItIsAnOwner()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertIsBool($role->isOwner());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasACreatedAtDate()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertInstanceOf(Carbon::class, $role->getCreatedAt());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnUpdatedAtDate()
    {
        $role = $this->companyRole(self::TEST_COMPANY, self::TEST_ROLE);

        $this->assertInstanceOf(Carbon::class, $role->getUpdatedAt());
    }
}
