<?php
/**
 * Created by PhpStorm.
 * User: thor
 * Date: 12.07.16
 * Time: 09:55.
 */

namespace TruckersMP\Types;

use Carbon\Carbon;

class GameTime
{
    public $time;

    /**
     * GameTime constructor.
     *
     * @param array $response
     *
     * @throws \Exception
     */
    public function __construct(array $response)
    {
        if ($response['error']) {
            // TODO: actually throw a usable error
            throw new \Exception('API Error');
        }
        $load['minutes'] = $response['game_time'];

        $load['hours']   = $load['minutes'] / 60;
        $load['minutes'] = $load['minutes'] % 60;

        $load['days']  = $load['hours'] / 24;
        $load['hours'] = $load['hours'] % 24;

        $load['months'] = $load['days'] / 30;
        $load['days']   = $load['days'] % 30;

        $load['years']  = intval($load['months'] / 12);
        $load['months'] = $load['months'] % 12;

        $this->time = Carbon::create($load['years'], $load['months'], $load['days'], $load['hours'], $load['minutes']);
    }
}
