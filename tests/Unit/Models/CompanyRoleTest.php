<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\CompanyRole;

class CompanyRoleTest extends TestCase
{
    use MockModelData;

    /**
     * A CompanyRole model instance with mocked data.
     *
     * @var CompanyRole
     */
    private CompanyRole $role;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('company.role.json');

        $this->role = new CompanyRole($this->client, $data);
    }

    public function testItHasAnId()
    {
        $this->assertSame(1, $this->role->getId());
    }

    public function testItHasAName()
    {
        $this->assertSame('Name', $this->role->getName());
    }

    public function testItHasAnOrder()
    {
        $this->assertSame(2, $this->role->getOrder());
    }

    public function testItIsAnOwner()
    {
        $this->assertTrue($this->role->isOwner());
    }

    public function testItHasACreationDate()
    {
        $this->assertDate('2023-01-04 15:34:05', $this->role->getCreatedAt());
    }

    public function testItHasAnUpdateDate()
    {
        $this->assertDate('2023-01-04 15:34:07', $this->role->getUpdatedAt());
    }
}
