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
     * @return Server[]
     * @throws \Http\Client\Exception
     */
    public function get(): array
    {
        $servers = new ServerCollection(
            $this->call()
        );

        return $servers->all();
    }
}
