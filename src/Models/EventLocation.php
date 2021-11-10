<?php

namespace TruckersMP\APIClient\Models;

class EventLocation
{
    /**
     * The event location.
     *
     * @var string
     */
    protected $location;

    /**
     * The event city.
     *
     * @var string|null
     */
    protected $city;

    /**
     * Create a new EventLocation instance.
     *
     * @param  string  $location
     * @param  string|null  $city
     * @return void
     */
    public function __construct(
        string $location,
        ?string $city
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
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }
}
