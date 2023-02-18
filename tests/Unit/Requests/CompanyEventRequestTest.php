<?php

namespace Tests\Unit\Requests;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\CompanyEventIndex;
use TruckersMP\APIClient\Models\Event;

class CompanyEventRequestTest extends TestCase
{
    use MockAPIRequests;

    public function testItCanGetAllCompanyEvents()
    {
        $this->mockRequest('company.event.index.json', 'vtc/258/events');

        $index = $this->client->company(258)->events()->get();

        $this->assertInstanceOf(CompanyEventIndex::class, $index);

        $events = $index->getEvents();

        $this->assertInstanceOf(Collection::class, $events);
        $this->assertCount(1, $events);

        $this->assertInstanceOf(Event::class, $events->first());
    }

    public function testItCanGetASpecificCompanyEvent()
    {
        $this->mockRequest('event.json', 'vtc/258/events/45');

        $event = $this->client->company(258)->event(45)->get();

        $this->assertInstanceOf(Event::class, $event);
    }
}
