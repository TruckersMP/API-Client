<?php

namespace Tests\Unit\Models;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\EventAttendance;
use TruckersMP\APIClient\Models\EventAttendee;

class EventAttendanceTest extends TestCase
{
    use MockModelData;

    /**
     * An EventAttendance model instance filled with mocked data.
     *
     * @var EventAttendance
     */
    private EventAttendance $attendance;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('event.attendance.json');

        $this->attendance = new EventAttendance($this->client, $data);
    }

    public function testItHasConfirmedUsers()
    {
        $users = $this->attendance->getConfirmedUsers();

        $this->assertInstanceOf(Collection::class, $users);
        $this->assertCount(1, $users);

        $this->assertInstanceOf(EventAttendee::class, $users->first());
    }

    public function testItHasUnsureUsers()
    {
        $users = $this->attendance->getUnsureUsers();

        $this->assertInstanceOf(Collection::class, $users);
        $this->assertCount(2, $users);

        $this->assertInstanceOf(EventAttendee::class, $users->first());
    }
}
