<?php

namespace TruckersMP\APIClient\Models;

use Illuminate\Support\Collection;
use TruckersMP\APIClient\Client;

class CompanyEventIndex
{
    /**
     * The company events.
     *
     * @var Collection
     */
    protected Collection $events;

    /**
     * Create a new CompanyEventIndex instance.
     *
     * @param  Client  $client
     * @param  array  $response
     * @return void
     */
    public function __construct(Client $client, array $response)
    {
        $this->events = (new Collection($response))
            ->map(fn (array $event) => new Event($client, $event));
    }

    /**
     * Get the collection of company events.
     *
     * @return Collection
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }
}
