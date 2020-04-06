<?php

namespace TruckersMP\APIClient\Models;

class Game
{
    /**
     * Whether the entity has/supports American Truck Simulator.
     *
     * @var bool
     */
    protected $ats;

    /**
     * Whether the entity has/supports Euro Truck Simulator 2.
     *
     * @var bool
     */
    protected $ets;

    /**
     * Create a new Game instance.
     *
     * @param  bool  $ats
     * @param  bool  $ets
     * @return void
     */
    public function __construct(bool $ats, bool $ets)
    {
        $this->ats = $ats;
        $this->ets = $ets;
    }

    /**
     * Determines if the entity has/supports American Truck Simulator.
     *
     * @return bool
     */
    public function isAts(): bool
    {
        return $this->ats;
    }

    /**
     * Determines if the entity has/supports Euro Truck Simulator 2.
     *
     * @return bool
     */
    public function isEts(): bool
    {
        return $this->ets;
    }
}
