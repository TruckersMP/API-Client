<?php

namespace TruckersMP\APIClient\Collections;

use TruckersMP\APIClient\Models\EventAttendee;

class EventAttendeeCollection extends Collection
{
    /**
     * Create a new EventAttendeeCollection instance.
     *
     * @param  array  $response
     * @return void
     */
    public function __construct(array $response)
    {
        parent::__construct();

        foreach ($response as $key => $attendee) {
            $this->items[$key] = new EventAttendee($attendee);
        }
    }
}
