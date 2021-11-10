<?php

namespace TruckersMP\APIClient\Models;

class EventType
{
    /**
     * The key of the event type.
     *
     * @var string
     */
    protected $key;

    /**
     * The name of the event type.
     *
     * @var string
     */
    protected $name;

    /**
     * Create a new EventType instance.
     *
     * @param string $key
     * @param string $name
     * @return void
     */
    public function __construct(
        string $key,
        string $name
    )
    {
        $this->key = $key;
        $this->name = $name;
    }

    /**
     * Get the key.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Get the value.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
