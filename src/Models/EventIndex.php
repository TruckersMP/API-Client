<?php

namespace TruckersMP\APIClient\Models;

use TruckersMP\APIClient\Collections\EventCollection;

class EventIndex
{
    /**
     * The featured events.
     *
     * @var EventCollection|null
     */
    protected $featured;

    /**
     * Today's events.
     *
     * @var EventCollection|null
     */
    protected $today;

    /**
     * The upcoming events.
     *
     * @var EventCollection|null
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
        if (array_key_exists('featured', $response)) {
            $this->featured = new EventCollection($response['featured']);
        }

        if (array_key_exists('today', $response)) {
            $this->today = new EventCollection($response['today']);
        }

        if (array_key_exists('upcoming', $response)) {
            $this->upcoming = new EventCollection($response['upcoming']);
        }
    }

    /**
     * Get the featured events.
     *
     * @return EventCollection|null
     */
    public function getFeatured(): ?EventCollection
    {
        return $this->featured;
    }

    /**
     * Get today's events.
     *
     * @return EventCollection|null
     */
    public function getToday(): ?EventCollection
    {
        return $this->today;
    }

    /**
     * Get the upcoming events.
     *
     * @return EventCollection|null
     */
    public function getUpcoming(): ?EventCollection
    {
        return $this->upcoming;
    }
}
