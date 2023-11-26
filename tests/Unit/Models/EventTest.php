<?php

namespace Tests\Unit\Models;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\Event;
use TruckersMP\APIClient\Models\EventAttendance;
use TruckersMP\APIClient\Models\EventCompany;
use TruckersMP\APIClient\Models\EventLocation;
use TruckersMP\APIClient\Models\EventOrganizer;
use TruckersMP\APIClient\Models\EventServer;
use TruckersMP\APIClient\Models\EventType;

class EventTest extends TestCase
{
    use MockModelData;

    /**
     * An Event model instance filled with mocked data.
     *
     * @var Event
     */
    private Event $event;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('event.json');

        $this->event = new Event($this->client, $data);
    }

    public function testItHasAnId()
    {
        $this->assertSame(45, $this->event->getId());
    }

    public function testItHasAType()
    {
        $type = $this->event->getEventType();

        $this->assertInstanceOf(EventType::class, $type);

        $this->assertSame('convoy', $type->getKey());
        $this->assertSame('Convoy', $type->getName());
    }

    public function testItHasAName()
    {
        $this->assertSame('Convoy', $this->event->getName());
    }

    public function testItHasASlug()
    {
        $this->assertSame('45-convoy', $this->event->getSlug());
    }

    public function testItHasAGame()
    {
        $this->assertSame('ETS2', $this->event->getGame());
    }

    public function testItHasAServer()
    {
        $server = $this->event->getServer();

        $this->assertInstanceOf(EventServer::class, $server);

        $this->assertSame(12, $server->getId());
        $this->assertSame('Server', $server->getName());
    }

    public function testItHasALanguage()
    {
        $this->assertSame('English', $this->event->getLanguage());
    }

    public function testItHasADepartureLocation()
    {
        $departure = $this->event->getDeparture();

        $this->assertInstanceOf(EventLocation::class, $departure);

        $this->assertSame('Hotel', $departure->getLocation());
        $this->assertSame('Prague', $departure->getCity());
    }

    public function testItHasAnArriveLocation()
    {
        $arrive = $this->event->getArrive();

        $this->assertInstanceOf(EventLocation::class, $arrive);

        $this->assertSame('Quarry', $arrive->getLocation());
        $this->assertSame('Stuttgart', $arrive->getCity());
    }

    public function testItHasAStartDate()
    {
        $this->assertDate('2023-01-04 14:32:28', $this->event->getStartAt());
    }

    public function testItHasAMeetupDate()
    {
        $this->assertDate('2023-01-04 14:02:28', $this->event->getMeetupAt());
    }

    public function testItHasABanner()
    {
        $this->assertSame('https://static.truckersmp.com/images/event/cover/cover.png', $this->event->getBanner());
    }

    public function testItHasAMap()
    {
        $this->assertSame('https://static.truckersmp.com/images/event/map/map.png', $this->event->getMap());
    }

    public function testItHasADescription()
    {
        $this->assertSame('Description', $this->event->getDescription());
    }

    public function testItHasRules()
    {
        $this->assertSame('Rules', $this->event->getRule());
    }

    public function testItHasAVoiceLink()
    {
        $this->assertSame('https://discord.gg/truckersmp', $this->event->getVoiceLink());
    }

    public function testItHasAnExternalLink()
    {
        $this->assertSame('https://truckersmp.com', $this->event->getExternalLink());
    }

    public function testItHasAFeaturedState()
    {
        $this->assertSame('Official', $this->event->getFeatured());
    }

    public function testItHasACompany()
    {
        $company = $this->event->getCompany();

        $this->assertInstanceOf(EventCompany::class, $company);

        $this->assertSame(22, $company->getId());
        $this->assertSame('Company', $company->getName());
    }

    public function testItHasAnOrganizer()
    {
        $organizer = $this->event->getOrganizer();

        $this->assertInstanceOf(EventOrganizer::class, $organizer);

        $this->assertSame(68, $organizer->getId());
        $this->assertSame('User', $organizer->getUsername());
    }

    public function testItHasAnAttendance()
    {
        $attendance = $this->event->getAttendance();

        $this->assertInstanceOf(EventAttendance::class, $attendance);

        $this->assertInstanceOf(Collection::class, $attendance->getConfirmedUsers());
        $this->assertCount(1, $attendance->getConfirmedUsers());

        $this->assertInstanceOf(Collection::class, $attendance->getUnsureUsers());
        $this->assertCount(1, $attendance->getUnsureUsers());
    }

    public function testItHasAnUrl()
    {
        $this->assertSame('/events/45-convoy', $this->event->getUrl());
    }

    public function testItHasACreationDate()
    {
        $this->assertDate('2023-01-04 14:37:30', $this->event->getCreatedAt());
    }

    public function testItHasAnUpdateDate()
    {
        $this->assertDate('2023-01-04 14:37:46', $this->event->getUpdatedAt());
    }
}
