<?php

namespace TruckersMP\APIClient\Models;

use Illuminate\Support\Collection;
use TruckersMP\APIClient\Client;

class EventIndex
{
    /**
     * The featured events.
     *
     * @var Collection
     */
    protected Collection $featured;

    /**
     * Today's events.
     *
     * @var Collection
     */
    protected Collection $today;

    /**
     * The upcoming events.
     *
     * @var Collection
     */
    protected Collection $upcoming;

    /**
     * Create a new EventIndex instance.
     *
     * @param  Client  $client
     * @param  array  $response
     * @return void
     */
    public function __construct(Client $client, array $response)
    {
        $mapEvent = fn (array $event) => new Event($client, $event);

        $this->featured = (new Collection($response['featured'] ?? []))->map($mapEvent);
        $this->today = (new Collection($response['today'] ?? []))->map($mapEvent);
        $this->upcoming = (new Collection($response['upcoming'] ?? []))->map($mapEvent);
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
