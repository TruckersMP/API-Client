<?php

namespace TruckersMP\APIClient\Requests;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Collections\ServerCollection;
use TruckersMP\APIClient\Exceptions\ApiErrorException;

class ServerRequest extends Request
{
    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'servers';
    }

    /**
     * Get the data for the request.
     *
     * @return ServerCollection
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): ServerCollection
    {
        return new ServerCollection(
            $this->send()['response']
        );
    }
}
