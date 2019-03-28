<?php

namespace TruckersMP\Models;

use Carbon\Carbon;
use TruckersMP\Exceptions\APIErrorException;

class GameTimeModel
{
    /**
     * @var Carbon
     */
    protected $time;

    /**
     * GameTimeModel constructor.
     *
     * @param array $response
     * @throws \Exception
     */
    public function __construct(array $response)
    {
        if ($response['error']) {
            throw new APIErrorException($response['error']);
        }

        $load['minutes'] = $response['game_time'];

        $load['hours'] = $load['minutes'] / 60;
        $load['minutes'] = $load['minutes'] % 60;

        $load['days'] = $load['hours'] / 24;
        $load['hours'] = $load['hours'] % 24;

        $load['months'] = $load['days'] / 30;
        $load['days'] = $load['days'] % 30;

        $load['years'] = intval($load['months'] / 12);
        $load['months'] = $load['months'] % 12;

        $this->time = Carbon::create($load['years'], $load['months'], $load['days'], $load['hours'], $load['minutes']);
    }

    /**
     * @return Carbon
     */
    public function getTime(): Carbon
    {
        return $this->time;
    }
}
