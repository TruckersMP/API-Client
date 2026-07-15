<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\Company;
use TruckersMP\APIClient\Models\CompanyPartnership;

class CompanyPartnershipTest extends TestCase
{
    use MockModelData;

    /**
     * A CompanyPartnership model instance with mocked data.
     *
     * @var CompanyPartnership
     */
    private CompanyPartnership $partnership;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('company.partnership.json');

        $this->partnership = new CompanyPartnership($this->client, $data);
    }

    public function testItHasAnId()
    {
        $this->assertSame(21, $this->partnership->getId());
    }

    public function testItHasAStatus()
    {
        $this->assertSame('Accepted', $this->partnership->getStatus());
    }

    public function testItHasACreationDate()
    {
        $this->assertDate('2025-03-08 17:30:06', $this->partnership->getCreatedAt());
    }

    public function testItHasAnUpdateDate()
    {
        $this->assertDate('2025-03-10 20:39:08', $this->partnership->getUpdatedAt());
    }

    public function testItHasASender()
    {
        $sender = $this->partnership->getSender();

        $this->assertInstanceOf(Company::class, $sender);
        $this->assertSame(1, $sender->getId());
        $this->assertSame('TruckersMP Developers', $sender->getName());
    }

    public function testItHasAReceiver()
    {
        $receiver = $this->partnership->getReceiver();

        $this->assertInstanceOf(Company::class, $receiver);
        $this->assertSame(2, $receiver->getId());
        $this->assertSame('TruckersMP Team', $receiver->getName());
    }
}
