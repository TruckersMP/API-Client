<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\PlayerCompanyHistory;

class PlayerCompanyHistoryTest extends TestCase
{
    use MockModelData;

    /**
     * A PlayerCompanyHistory model instance filled with mocked data.
     *
     * @var PlayerCompanyHistory
     */
    private PlayerCompanyHistory $companyHistory;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('player.company.history.json');

        $this->companyHistory = new PlayerCompanyHistory($this->client, $data);
    }

    public function testItHasAnId()
    {
        $this->assertSame(2, $this->companyHistory->getId());
    }

    public function testItHasAName()
    {
        $this->assertSame('TruckersMP Team', $this->companyHistory->getName());
    }

    public function testItIsNotVerified()
    {
        $this->assertFalse($this->companyHistory->isVerified());
    }

    public function testItHasAJoinDate()
    {
        $this->assertDate('2018-04-25 20:24:03', $this->companyHistory->getJoinDate());
    }

    public function testItHasALeftDate()
    {
        $this->assertDate('2019-07-13 15:39:58', $this->companyHistory->getLeftDate());
    }
}
