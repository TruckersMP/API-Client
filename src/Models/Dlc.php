<?php

namespace TruckersMP\APIClient\Models;

class Dlc
{
    /**
     * The DLC ID.
     *
     * @var int
     */
    protected $id;

    /**
     * The DLC name.
     *
     * @var string
     */
    protected $name;

    /**
     * Create a new Dlc instance.
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
     * Get the DLC ID.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the DLC name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
