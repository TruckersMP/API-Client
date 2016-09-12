<?php
/**
 * Created by PhpStorm.
 * User: thor
 * Date: 12.07.16
 * Time: 09:55
 */

namespace TruckersMP\Types;

use Carbon\Carbon;
use Psr\Http\Message\ResponseInterface;

class GameTime
{

    public $time;

    public function __construct(ResponseInterface $response)
    {
        $json = json_decode((string)$response->getBody(), true, 512, JSON_BIGINT_AS_STRING);

        if ($json['error']) {
            // TODO: actually throw a usable error
            throw new \Exception('API Error');
        }
        $load['minutes'] = $json['game_time'];

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
}
