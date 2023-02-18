<?php

namespace Tests\Unit\Requests;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\CompanyRole;

class CompanyRoleRequestTest extends TestCase
{
    use MockAPIRequests;

    public function testItCanGetAllCompanyRoles()
    {
        $this->mockRequest('company.role.index.json', 'vtc/33/roles');

        $roles = $this->client->company(33)->roles()->get();

        $this->assertInstanceOf(Collection::class, $roles);
        $this->assertCount(1, $roles);

        $this->assertInstanceOf(CompanyRole::class, $roles->first());
    }

    public function testItCanGetASpecificCompanyRole()
    {
        $this->mockRequest('company.role.json', 'vtc/33/role/1');

        $role = $this->client->company(33)->role(1)->get();

        $this->assertInstanceOf(CompanyRole::class, $role);
    }
}
