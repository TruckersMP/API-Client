<?php

namespace TruckersMP\APIClient\Requests;

use Illuminate\Support\Collection;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Client;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\Event;

class EventUserRequest extends Request
{
    /**
     * The ID of the requested user.
     *
     * @var int
     */
    protected int $userId;

    /**
     * Create a new EventUserRequest instance.
     *
     * @param  Client  $client
     * @param  int  $userId
     * @return void
     */
    public function __construct(Client $client, int $userId)
    {
        parent::__construct($client);

        $this->userId = $userId;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'events/user/' . $this->userId;
    }

    /**
     * Get the data for the request.
     *
     * @return Collection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get()
    {
        return (new Collection($this->send()['response']))
            ->map(fn (array $event) => new Event($this->client, $event));
    }
}
