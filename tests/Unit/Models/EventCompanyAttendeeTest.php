<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\EventCompanyAttendee;

class EventCompanyAttendeeTest extends TestCase
{
    use MockModelData;

    /**
     * An EventCompanyAttendee model instance filled with mocked data.
     *
     * @var EventCompanyAttendee
     */
    private EventCompanyAttendee $attendee;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('event.attendee.company.json');

        $this->attendee = new EventCompanyAttendee($this->client, $data);
    }

    public function testItHasAnId()
    {
        $this->assertSame(2, $this->attendee->getId());
    }

    public function testItHasAName()
    {
        $this->assertSame('TruckersMP Team', $this->attendee->getName());
    }

    public function testItIsNotFollowing()
    {
        $this->assertFalse($this->attendee->isFollowing());
    }

    public function testItHasACreationDate()
    {
        $this->assertDate('2023-02-25 11:01:05', $this->attendee->getCreatedAt());
    }

    public function testItHasAnUpdateDate()
    {
        $this->assertDate('2023-02-25 11:02:08', $this->attendee->getUpdatedAt());
    }
}
