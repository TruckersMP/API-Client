<?php

namespace TruckersMP\Models;

class Game
{
    /**
     * @var bool
     */
    protected $ats;

    /**
     * @var bool
     */
    protected $ets;

    /**
     * Create a new Game instance.
     *
     * @param bool $ats
     * @param bool $ets
     */
    public function __construct(bool $ats, bool $ets)
    {
        $this->ats = $ats;
        $this->ets = $ets;
    }

    /**
     * @return bool
     */
    public function isAts(): bool
    {
        return $this->ats;
    }

    /**
     * @return bool
     */
    public function isEts(): bool
    {
        return $this->ets;
    }
}
