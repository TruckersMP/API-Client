<?php

namespace TruckersMP\APIClient\Requests;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
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
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): GameTime
    {
        return new GameTime(
            $this->client,
            $this->send()
        );
    }
}
