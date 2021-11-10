<?php

namespace TruckersMP\APIClient\Models;

class EventServer
{
    /**
     * The event server ID.
     *
     * @var int
     */
    protected $id;

    /**
     * The event server name.
     *
     * @var string
     */
    protected $name;

    /**
     * Create a new EventServer instance.
     *
     * @param int $id
     * @param string $name
     * @return void
     */
    public function __construct(
        int $id,
        string $name
    ) {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get the ID.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
