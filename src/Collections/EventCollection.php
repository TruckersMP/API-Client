<?php

namespace TruckersMP\APIClient\Collections;

use TruckersMP\APIClient\Models\Event;

class EventCollection extends Collection
{
    /**
     * Create a new EventCollection instance.
     *
     * @param  array  $response
     * @return void
     */
    public function __construct(array $response)
    {
        parent::__construct();

        foreach ($response as $key => $event) {
            $this->items[$key] = new Event($event);
        }
    }
}
