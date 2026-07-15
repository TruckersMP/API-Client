<?php

namespace Tests\Unit\Requests;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\Event;
use TruckersMP\APIClient\Models\EventIndex;
use TruckersMP\APIClient\Models\EventSlot;

class EventRequestTest extends TestCase
{
    use MockAPIRequests;

    public function testItCanGetAllEvents()
    {
        $this->mockRequest('event.index.json', 'events');

        $index = $this->client->events()->get();

        $this->assertInstanceOf(EventIndex::class, $index);
    }

    public function testItCanGetASpecificEvent()
    {
        $this->mockRequest('event.json', 'events/45');

        $event = $this->client->event(45)->get();

        $this->assertInstanceOf(Event::class, $event);
    }

    public function testItCanGetEventSlots()
    {
        $this->mockRequest('event.slot.index.json', 'events/45/slots');

        $slots = $this->client->event(45)->slots()->get();

        $this->assertInstanceOf(Collection::class, $slots);
        $this->assertCount(2, $slots);

        $this->assertInstanceOf(EventSlot::class, $slots->first());
    }
}
