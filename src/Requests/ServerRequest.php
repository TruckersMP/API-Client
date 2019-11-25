<?php

namespace TruckersMP\Requests;

use TruckersMP\Collections\ServerCollection;
use TruckersMP\Models\Server;
use function GuzzleHttp\Promise\all;

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
     * @return \TruckersMP\Collections\ServerCollection|Server[]
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function get(): ServerCollection
    {
        return new ServerCollection(
            $this->send()['response']
        );
    }
}
