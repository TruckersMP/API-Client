<?php

namespace TruckersMP\APIClient\Requests;

use Illuminate\Support\Collection;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\Server;

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
     * @return Collection
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): Collection
    {
        return (new Collection($this->send()['response']))
            ->map(fn (array $server) => new Server($this->client, $server));
    }
}
