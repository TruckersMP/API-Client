<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\PlayerAward;

class PlayerAwardTest extends TestCase
{
    use MockModelData;

    /**
     * A PlayerAward model instance filled with mocked data.
     *
     * @var PlayerAward
     */
    private PlayerAward $award;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('player.award.json');

        $this->award = new PlayerAward($this->client, $data);
    }

    public function testItHasAnId()
    {
        $this->assertSame(2, $this->award->getId());
    }

    public function testItHasAName()
    {
        $this->assertSame('Easter Egg Hunt 2019', $this->award->getName());
    }

    public function testItHasAnImageUrl()
    {
        $this->assertSame(
            'https://static.truckersmp.com/images/awards/award.png',
            $this->award->getImageUrl(),
        );
    }

    public function testItHasAnAwardedDate()
    {
        $this->assertDate('2020-12-11 14:30:25', $this->award->getAwardedAt());
    }
}
