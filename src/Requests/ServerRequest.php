<?php

namespace TruckersMP\APIClient\Requests;

use TruckersMP\APIClient\Collections\ServerCollection;

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
     * @return \TruckersMP\APIClient\Collections\ServerCollection
     *
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\APIClient\Exceptions\PageNotFoundException
     * @throws \TruckersMP\APIClient\Exceptions\RequestException
     */
    public function get(): ServerCollection
    {
        return new ServerCollection(
            $this->send()['response']
        );
    }
}
