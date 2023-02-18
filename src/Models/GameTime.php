<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use TruckersMP\APIClient\Client;

class GameTime extends Model
{
    /**
     * The game time.
     *
     * @var Carbon
     */
    protected Carbon $time;

    /**
     * Create a new GameTime instance.
     *
     * @param  Client  $client
     * @param  array  $gameTime
     * @return void
     */
    public function __construct(Client $client, array $gameTime)
    {
        parent::__construct($client, $gameTime);

        $time['minutes'] = $this->getValue('game_time', 0);

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
