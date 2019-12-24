<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;

class GameTime
{
    /**
     * The game time.
     *
     * @var \Carbon\Carbon
     */
    protected $time;

    /**
     * Create a new GameTime instance.
     *
     * @param array $gameTime
     */
    public function __construct(array $gameTime)
    {
        $time['minutes'] = $gameTime['game_time'];

        $time['hours'] = $time['minutes'] / 60;
        $time['minutes'] = $time['minutes'] % 60;

        $time['days'] = $time['hours'] / 24;
        $time['hours'] = $time['hours'] % 24;

        $time['months'] = $time['days'] / 30;
        $time['days'] = $time['days'] % 30;

        $time['years'] = intval($time['months'] / 12);
        $time['months'] = $time['months'] % 12;

        $this->time = Carbon::create(
            $time['years'],
            $time['months'],
            $time['days'],
            $time['hours'],
            $time['minutes']
        );
    }

    /**
     * @return \Carbon\Carbon
     */
    public function getTime(): Carbon
    {
        return $this->time;
    }
}
