<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\Server;
use TruckersMP\APIClient\Models\ServerEventRequest;

class ServerEventRequestTest extends TestCase
{
    use MockModelData;

    /**
     * A ServerEventRequest model instance with mocked data.
     *
     * @var ServerEventRequest
     */
    private ServerEventRequest $eventRequest;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('server.event.json');

        $server = new Server($this->client, $data);

        $this->eventRequest = $server->getEventRequest();
    }

    public function testItHasAnId()
    {
        $this->assertSame(7504, $this->eventRequest->getId());
    }

    public function testItHasAnEventId()
    {
        $this->assertSame(33198, $this->eventRequest->getEventId());
    }

    public function testItHasAUserId()
    {
        $this->assertSame(33, $this->eventRequest->getUserId());
    }

    public function testItHasInformation()
    {
        $this->assertSame('Information about the event request.', $this->eventRequest->getInfo());
    }

    public function testItHasRules()
    {
        $this->assertSame('Temporary rules for the server.', $this->eventRequest->getRules());
    }

    public function testItHasAStartDate()
    {
        $this->assertDate('2026-07-14 17:00:00', $this->eventRequest->getStartAt());
    }

    public function testItHasAnEndDate()
    {
        $this->assertDate('2026-07-14 23:00:00', $this->eventRequest->getEndAt());
    }

    public function testItHasAHeaderImage()
    {
        $this->assertSame(
            'https://static.truckersmp.com/images/event/cover/cover.png',
            $this->eventRequest->getHeaderImage()
        );
    }

    public function testItHasAnEventLink()
    {
        $this->assertSame('https://truckersmp.com/events/33198', $this->eventRequest->getEventLink());
    }

    public function testItDoesNotHaveAForumLink()
    {
        $this->assertNull($this->eventRequest->getForumLink());
    }
}
