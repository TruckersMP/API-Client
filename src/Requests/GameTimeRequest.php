<?php

namespace TruckersMP\Requests;

use TruckersMP\Models\GameTime;

class GameTimeRequest extends Request
{

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'game_time';
    }

    /**
     * Get the data for the request.
     *
     * @return GameTime
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function get(): GameTime
    {
        return new GameTime(
            $this->send()
        );
    }
}
