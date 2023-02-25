<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\EventAttendee;

class EventAttendeeTest extends TestCase
{
    use MockModelData;

    /**
     * An EventAttendee model instance filled with mocked data.
     *
     * @var EventAttendee
     */
    private EventAttendee $attendee;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('event.attendee.user.json');

        $this->attendee = new EventAttendee($this->client, $data);
    }

    public function testItHasAnId()
    {
        $this->assertSame(879, $this->attendee->getId());
    }

    public function testItHasAUsername()
    {
        $this->assertSame('Attendee', $this->attendee->getUsername());
    }

    public function testItIsNotFollowing()
    {
        $this->assertFalse($this->attendee->isFollowing());
    }

    public function testItHasACreationDate()
    {
        $this->assertDate('2023-01-04 14:43:05', $this->attendee->getCreatedAt());
    }

    public function testItHasAnUpdateDate()
    {
        $this->assertDate('2023-01-04 14:43:08', $this->attendee->getUpdatedAt());
    }
}
