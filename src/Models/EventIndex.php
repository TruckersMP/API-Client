<?php

namespace TruckersMP\APIClient\Models;

use Illuminate\Support\Collection;

class EventIndex
{
    /**
     * The featured events.
     *
     * @var Collection
     */
    protected $featured;

    /**
     * Today's events.
     *
     * @var Collection
     */
    protected $today;

    /**
     * The upcoming events.
     *
     * @var Collection
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
        $this->featured = (new Collection($response['featured'] ?? []))->mapInto(Event::class);

        $this->today = (new Collection($response['today'] ?? []))->mapInto(Event::class);

        $this->upcoming = (new Collection($response['upcoming'] ?? []))->mapInto(Event::class);
    }

    /**
     * Get the featured events.
     *
     * @return Collection
     */
    public function getFeatured(): Collection
    {
        return $this->featured;
    }

    /**
     * Get today's events.
     *
     * @return Collection
     */
    public function getToday(): Collection
    {
        return $this->today;
    }

    /**
     * Get the upcoming events.
     *
     * @return Collection
     */
    public function getUpcoming(): Collection
    {
        return $this->upcoming;
    }
}
