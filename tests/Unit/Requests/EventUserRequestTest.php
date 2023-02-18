<?php

namespace Tests\Unit\Requests;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\Event;

class EventUserRequestTest extends TestCase
{
    use MockAPIRequests;

    public function testItCanGetUserEvents()
    {
        $this->mockRequest('event.user.json', 'events/user/1287455');

        $events = $this->client->player(1287455)->events()->get();

        $this->assertInstanceOf(Collection::class, $events);
        $this->assertCount(1, $events);

        $this->assertInstanceOf(Event::class, $events->first());
    }
}
