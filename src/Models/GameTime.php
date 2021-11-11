<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;

class GameTime
{
    /**
     * The game time.
     *
     * @var Carbon
     */
    protected $time;

    /**
     * Create a new GameTime instance.
     *
     * @param  array  $gameTime
     * @return void
     */
    public function __construct(array $gameTime)
    {
        $time['minutes'] = $gameTime['game_time'];

        $time['hours'] = $time['minutes'] / 60;
        $time['minutes'] %= 60;

        $time['days'] = $time['hours'] / 24;
        $time['hours'] %= 24;

        $time['months'] = $time['days'] / 30;
        $time['days'] %= 30;

        $time['years'] = intval($time['months'] / 12);
        $time['months'] %= 12;

        $this->time = Carbon::create(
            $time['years'],
            $time['months'],
            $time['days'],
            $time['hours'],
            $time['minutes']
        );
    }

    /**
     * Get the game time as a Carbon instance.
     *
     * @return Carbon
     */
    public function getTime(): Carbon
    {
        return $this->time;
    }
}
