<?php

namespace TruckersMP\APIClient\Models;

use TruckersMP\APIClient\Collections\EventCollection;

class CompanyEventIndex
{
    /**
     * The company events.
     *
     * @var EventCollection
     */
    protected $events;

    /**
     * Create a new CompanyEventIndex instance.
     *
     * @param array $response
     * @return void
     */
    public function __construct(array $response)
    {
        $this->events = new EventCollection($response);
    }

    /**
     * Get the collection of company events.
     *
     * @return EventCollection
     */
    public function getEvents(): EventCollection
    {
        return $this->events;
    }
}
