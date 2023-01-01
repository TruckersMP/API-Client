<?php

namespace TruckersMP\APIClient\Models;

class EventLocation
{
    /**
     * The event location.
     *
     * @var string
     */
    protected string $location;

    /**
     * The event city.
     *
     * @var string
     */
    protected string $city;

    /**
     * Create a new EventLocation instance.
     *
     * @param  string  $location
     * @param  string  $city
     * @return void
     */
    public function __construct(
        string $location,
        string $city
    ) {
        $this->location = $location;
        $this->city = $city;
    }

    /**
     * Get the location.
     *
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * Get the city.
     *
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }
}
