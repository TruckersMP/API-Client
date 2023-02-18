<?php

namespace Tests\Unit\Requests;

use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\Event;
use TruckersMP\APIClient\Models\EventIndex;

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
}
