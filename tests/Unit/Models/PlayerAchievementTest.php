<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\PlayerAchievement;

class PlayerAchievementTest extends TestCase
{
    use MockModelData;

    /**
     * A PlayerAchievement model instance filled with mocked data.
     *
     * @var PlayerAchievement
     */
    private PlayerAchievement $achievement;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('player.achievement.json');

        $this->achievement = new PlayerAchievement($this->client, $data);
    }

    public function testItHasAnId()
    {
        $this->assertSame(1, $this->achievement->getId());
    }

    public function testItHasATitle()
    {
        $this->assertSame('Operation HQ', $this->achievement->getTitle());
    }

    public function testItHasADescription()
    {
        $this->assertSame(
            'Let\'s build a home for the TruckersMP community!',
            $this->achievement->getDescription(),
        );
    }

    public function testItHasAnImageUrl()
    {
        $this->assertSame(
            'https://static.truckersmp.com/images/achievements/achievement.png',
            $this->achievement->getImageUrl(),
        );
    }

    public function testItHasAnAchievedDate()
    {
        $this->assertDate('2022-02-14 12:42:24', $this->achievement->getAchievedAt());
    }
}
