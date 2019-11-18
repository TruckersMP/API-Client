<?php

namespace TruckersMP\Requests;

use TruckersMP\Models\Server;

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
        $servers = [];
        $results = $this->call();

        // TODO: handle any errors / exceptions

        foreach ($results['response'] as $key => $server) {
            $servers[$key] = new Server($server);
        }

        return $servers;
    }
}
