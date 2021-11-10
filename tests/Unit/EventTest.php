<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\APIClient\Collections\DlcCollection;
use TruckersMP\APIClient\Collections\EventAttendeeCollection;
use TruckersMP\APIClient\Collections\EventCollection;
use TruckersMP\APIClient\Models\Event;
use TruckersMP\APIClient\Models\EventAttendance;
use TruckersMP\APIClient\Models\EventCompany;
use TruckersMP\APIClient\Models\EventIndex;
use TruckersMP\APIClient\Models\EventLocation;
use TruckersMP\APIClient\Models\EventOrganizer;
use TruckersMP\APIClient\Models\EventServer;
use TruckersMP\APIClient\Models\EventType;

class EventTest extends TestCase
{
    /**
     * The ID of the event to use in the tests.
     */
    private const TEST_EVENT = 5584;

    /** @test */
    public function it_can_get_all_the_events()
    {
        $events = $this->events();

        $this->assertNotEmpty($events);

        $this->assertInstanceOf(EventIndex::class, $events);
    }

    /** @test */
    public function it_can_get_the_featured_events()
    {
        $events = $this->events()->getFeatured();

        $this->assertNotEmpty($events);

        $this->assertInstanceOf(EventCollection::class, $events);
    }

    /** @test */
    public function it_can_get_todays_events()
    {
        $events = $this->events()->getToday();

        $this->assertNotEmpty($events);

        $this->assertInstanceOf(EventCollection::class, $events);
    }

    /** @test */
    public function it_can_get_the_upcoming_events()
    {
        $events = $this->events()->getUpcoming();

        $this->assertNotEmpty($events);

        $this->assertInstanceOf(EventCollection::class, $events);
    }

    /** @test */
    public function it_can_get_a_specific_event()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertInstanceOf(Event::class, $event);
    }

    /** @test */
    public function it_has_an_id()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertIsInt($event->getId());
    }

    /** @test */
    public function it_has_a_event_type()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertInstanceOf(EventType::class, $event->getEventType());

        $this->assertIsString($event->getEventType()->getKey());

        $this->assertIsString($event->getEventType()->getName());
    }

    /** @test */
    public function it_has_a_name()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertIsString($event->getName());
    }

    /** @test */
    public function it_has_a_slug()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertIsString($event->getSlug());
    }

    /** @test */
    public function it_has_a_game()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertIsString($event->getGame());
    }

    /** @test */
    public function it_has_a_server()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertInstanceOf(EventServer::class, $event->getServer());

        $this->assertIsInt($event->getServer()->getId());

        $this->assertIsString($event->getServer()->getName());
    }

    /** @test */
    public function it_has_a_language()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertIsString($event->getLanguage());
    }

    /** @test */
    public function it_has_a_departure_location()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertInstanceOf(EventLocation::class, $event->getDeparture());

        $this->assertIsString($event->getDeparture()->getLocation());

        if ($event->getDeparture()->getCity() !== null) {
            $this->assertIsString($event->getDeparture()->getCity());
        } else {
            $this->assertNull($event->getDeparture()->getCity());
        }
    }

    /** @test */
    public function it_has_a_arrive_location()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertInstanceOf(EventLocation::class, $event->getArrive());

        $this->assertIsString($event->getArrive()->getLocation());

        if ($event->getArrive()->getCity() !== null) {
            $this->assertIsString($event->getArrive()->getCity());
        } else {
            $this->assertNull($event->getArrive()->getCity());
        }
    }

    /** @test */
    public function it_has_a_start_date()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertInstanceOf(Carbon::class, $event->getStartAt());
    }

    /** @test */
    public function it_has_a_banner()
    {
        $event = $this->event(self::TEST_EVENT);

        if ($event->getBanner() !== null) {
            $this->assertIsString($event->getBanner());
        } else {
            $this->assertNull($event->getBanner());
        }
    }

    /** @test */
    public function it_has_a_map()
    {
        $event = $this->event(self::TEST_EVENT);

        if ($event->getMap() !== null) {
            $this->assertIsString($event->getMap());
        } else {
            $this->assertNull($event->getMap());
        }
    }

    /** @test */
    public function it_has_a_description()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertIsString($event->getDescription());
    }

    /** @test */
    public function it_has_a_rule()
    {
        $event = $this->event(self::TEST_EVENT);

        if ($event->getRule() !== null) {
            $this->assertIsString($event->getRule());
        } else {
            $this->assertNull($event->getRule());
        }
    }

    /** @test */
    public function it_has_a_voice_link()
    {
        $event = $this->event(self::TEST_EVENT);

        if ($event->getVoiceLink() !== null) {
            $this->assertIsString($event->getVoiceLink());
        } else {
            $this->assertNull($event->getVoiceLink());
        }
    }

    /** @test */
    public function it_has_an_external_link()
    {
        $event = $this->event(self::TEST_EVENT);

        if ($event->getExternalLink() !== null) {
            $this->assertIsString($event->getExternalLink());
        } else {
            $this->assertNull($event->getExternalLink());
        }
    }

    /** @test */
    public function it_has_a_featured_status()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertIsString($event->getFeatured());
    }

    /** @test */
    public function it_has_a_company()
    {
        $event = $this->event(self::TEST_EVENT);

        if ($event->getCompany() !== null) {
            $this->assertInstanceOf(EventCompany::class, $event->getCompany());

            $this->assertIsInt($event->getCompany()->getId());

            $this->assertIsString($event->getCompany()->getName());
        } else {
            $this->assertNull($event->getCompany());
        }
    }

    /** @test */
    public function it_has_an_organizer()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertInstanceOf(EventOrganizer::class, $event->getOrganizer());

        $this->assertIsInt($event->getOrganizer()->getId());

        $this->assertIsString($event->getOrganizer()->getUsername());
    }

    /** @test */
    public function it_has_an_attendance()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertInstanceOf(EventAttendance::class, $event->getAttendance());
    }

    /** @test */
    public function it_has_a_confirmed_attendance_count()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertIsInt($event->getAttendance()->getConfirmed());
    }

    /** @test */
    public function it_has_confirmed_attendees()
    {
        $event = $this->event(self::TEST_EVENT);

        if ($event->getAttendance()->getConfirmedUsers() !== null) {
            $this->assertInstanceOf(EventAttendeeCollection::class, $event->getAttendance()->getConfirmedUsers());
        } else {
            $this->assertNull($event->getAttendance()->getConfirmedUsers());
        }
    }

    /** @test */
    public function it_has_an_unsure_attendance_count()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertIsInt($event->getAttendance()->getUnsure());
    }

    /** @test */
    public function it_has_unsure_attendees()
    {
        $event = $this->event(self::TEST_EVENT);

        if ($event->getAttendance()->getUnsureUsers() !== null) {
            $this->assertInstanceOf(EventAttendeeCollection::class, $event->getAttendance()->getUnsureUsers());
        } else {
            $this->assertNull($event->getAttendance()->getUnsureUsers());
        }
    }

    /** @test */
    public function it_has_dlcs()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertInstanceOf(DlcCollection::class, $event->getDlcs());
    }

    /** @test */
    public function it_has_a_url()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertIsString($event->getUrl());
    }

    /** @test */
    public function it_has_a_created_at()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertInstanceOf(Carbon::class, $event->getCreatedAt());
    }

    /** @test */
    public function it_has_an_updated_at()
    {
        $event = $this->event(self::TEST_EVENT);

        $this->assertInstanceOf(Carbon::class, $event->getCreatedAt());
    }
}
