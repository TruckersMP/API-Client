<?php

namespace TruckersMP\APIClient\Models;

class EventOrganizer
{
    /**
     * The organizer's user ID.
     *
     * @var int
     */
    protected $id;

    /**
     * The organizer's username.
     *
     * @var string
     */
    protected $username;

    /**
     * Create a new EventOrganizer instance.
     *
     * @param int $id
     * @param string $username
     * @return void
     */
    public function __construct(
        int $id,
        string $username
    )
    {
        $this->id = $id;
        $this->username = $username;
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
     * Get the username.
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }
}
