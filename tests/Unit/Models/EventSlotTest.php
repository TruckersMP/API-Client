<?php

namespace Tests\Unit\Models;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\EventSlot;
use TruckersMP\APIClient\Models\EventSlotRequester;

class EventSlotTest extends TestCase
{
    use MockModelData;

    /**
     * An EventSlot model instance with mocked data.
     *
     * @var EventSlot
     */
    private EventSlot $slot;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('event.slot.json');

        $this->slot = new EventSlot($this->client, $data);
    }

    public function testItHasANumber()
    {
        $this->assertSame(1, $this->slot->getNumber());
    }

    public function testItHasAName()
    {
        $this->assertSame('Slot A1', $this->slot->getName());
    }

    public function testItHasAnImage()
    {
        $this->assertSame('https://static.truckersmp.com/images/event/slot/slot.png', $this->slot->getImageUrl());
    }

    public function testItHasTotalSpaces()
    {
        $this->assertSame(10, $this->slot->getTotalSpaces());
    }

    public function testItIsAvailable()
    {
        $this->assertTrue($this->slot->isAvailable());
    }

    public function testItHasAnEligibility()
    {
        $this->assertSame('all', $this->slot->getEligibility());
    }

    public function testItHasRequesters()
    {
        $requesters = $this->slot->getRequesters();

        $this->assertInstanceOf(Collection::class, $requesters);
        $this->assertCount(2, $requesters);

        $requester = $requesters->first();

        $this->assertInstanceOf(EventSlotRequester::class, $requester);
        $this->assertSame(1, $requester->getId());
        $this->assertSame('TruckersMP Developers', $requester->getName());
        $this->assertSame('https://static.truckersmp.com/images/vtc/logo/logo.png', $requester->getLogoUrl());
        $this->assertSame(8, $requester->getExpectedAttendees());
    }

    public function testItCanHaveADirectlyAllocatedRequester()
    {
        $requester = $this->slot->getRequesters()->last();

        $this->assertInstanceOf(EventSlotRequester::class, $requester);
        $this->assertSame(0, $requester->getExpectedAttendees());
    }
}
