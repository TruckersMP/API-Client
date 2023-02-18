<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\CompanyMember;

class CompanyMemberTest extends TestCase
{
    use MockModelData;

    /**
     * A CompanyMember model instance with mocked data.
     *
     * @var CompanyMember
     */
    private CompanyMember $member;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('company.member.json');

        $this->member = new CompanyMember($this->client, $data);
    }

    public function testItHasAnId()
    {
        $this->assertSame(123, $this->member->getId());
    }

    public function testItHasAUser()
    {
        $this->assertSame(1, $this->member->getUserId());
        $this->assertSame('User', $this->member->getUsername());
        $this->assertSame('76561198083585955', $this->member->getSteamId());
    }

    public function testItHasARole()
    {
        $this->assertSame(25, $this->member->getRoleId());
        $this->assertSame('Role', $this->member->getRole());
    }

    public function testItHasAJoinDate()
    {
        $this->assertDate('2023-01-04 11:35:05', $this->member->getJoinDate());
    }
}
