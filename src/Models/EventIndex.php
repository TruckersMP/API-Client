<?php

namespace TruckersMP\APIClient\Models;

use TruckersMP\APIClient\Collections\EventCollection;

class EventIndex
{
    /**
     * The featured events.
     *
     * @var EventCollection
     */
    protected $featured;

    /**
     * Today's events.
     *
     * @var EventCollection
     */
    protected $today;

    /**
     * The upcoming events.
     *
     * @var EventCollection
     */
    protected $upcoming;

    /**
     * Create a new EventIndex instance.
     *
     * @param  array  $response
     * @return void
     */
    public function __construct(array $response)
    {
        $this->featured = new EventCollection($response['featured'] ?? []);

        $this->today = new EventCollection($response['today'] ?? []);

        $this->upcoming = new EventCollection($response['upcoming'] ?? []);
    }

    /**
     * Get the featured events.
     *
     * @return EventCollection
     */
    public function getFeatured(): EventCollection
    {
        return $this->featured;
    }

    /**
     * Get today's events.
     *
     * @return EventCollection
     */
    public function getToday(): EventCollection
    {
        return $this->today;
    }

    /**
     * Get the upcoming events.
     *
     * @return EventCollection
     */
    public function getUpcoming(): EventCollection
    {
        return $this->upcoming;
    }
}
