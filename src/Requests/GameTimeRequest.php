<?php

namespace TruckersMP\APIClient\Requests;

use TruckersMP\APIClient\Models\GameTime;

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
     *
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\APIClient\Exceptions\PageNotFoundException
     * @throws \TruckersMP\APIClient\Exceptions\RequestException
     */
    public function get(): GameTime
    {
        return new GameTime(
            $this->send()
        );
    }
}
