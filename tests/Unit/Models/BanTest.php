<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\Ban;

class BanTest extends TestCase
{
    use MockModelData;

    /**
     * A Ban model instance with mocked data.
     *
     * @var Ban
     */
    private Ban $ban;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('ban.json');

        $this->ban = new Ban($this->client, $data);
    }

    public function testItHasAnExpiration()
    {
        $this->assertDate('2080-01-01 12:00:00', $this->ban->getExpirationDate());
    }

    public function testItHasACreationDate()
    {
        $this->assertDate('2023-01-01 12:00:00', $this->ban->getCreatedAt());
    }

    public function testItIsActive()
    {
        $this->assertTrue($this->ban->isActive());
    }

    public function testItHasAReason()
    {
        $this->assertSame('Reason', $this->ban->getReason());
    }

    public function testItHasAnAdmin()
    {
        $this->assertSame('Admin', $this->ban->getAdminName());
        $this->assertSame(123, $this->ban->getAdminId());
    }
}
