<?php

namespace Tests\Unit;

use Tests\TestCase;
use TruckersMP\APIClient\Models\CompanyEventIndex;
use TruckersMP\APIClient\Models\Event;

class CompanyEventTest extends TestCase
{
    /**
     * The ID of the company to use in the tests.
     */
    private const TEST_COMPANY = 30294;

    /**
     * The ID of the event to use in the tests.
     */
    private const TEST_EVENT = 5584;

    /** @test */
    public function it_can_get_all_the_events()
    {
        $events = $this->companyEvents(self::TEST_COMPANY);

        $this->assertInstanceOf(CompanyEventIndex::class, $events);
    }

    /** @test */
    public function it_can_get_a_specific_event()
    {
        $event = $this->companyEvent(self::TEST_COMPANY, self::TEST_EVENT);

        $this->assertInstanceOf(Event::class, $event);
    }
}
