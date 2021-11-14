<?php

namespace TruckersMP\APIClient\Models;

use Illuminate\Support\Collection;

class CompanyEventIndex
{
    /**
     * The company events.
     *
     * @var Collection
     */
    protected $events;

    /**
     * Create a new CompanyEventIndex instance.
     *
     * @param  array  $response
     * @return void
     */
    public function __construct(array $response)
    {
        $this->events = (new Collection($response))->mapInto(Event::class);
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
