<?php

namespace TruckersMP\APIClient\Requests\Company;

use Illuminate\Support\Collection;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Client;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\Event;
use TruckersMP\APIClient\Requests\Request;

class EventAttendingRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var int
     */
    protected int $companyId;

    /**
     * Create a new EventAttendingRequest instance.
     *
     * @param  Client  $client
     * @param  int  $id
     * @return void
     */
    public function __construct(Client $client, int $id)
    {
        parent::__construct($client);

        $this->companyId = $id;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyId . '/events/attending';
    }

    /**
     * Get the data for the request.
     *
     * @return Collection|Event[]
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): Collection
    {
        return (new Collection($this->send()['response']))
            ->map(fn (array $event) => new Event($this->client, $event));
    }
}
