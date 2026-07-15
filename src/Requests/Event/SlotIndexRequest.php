<?php

namespace TruckersMP\APIClient\Requests\Event;

use Illuminate\Support\Collection;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Client;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\EventSlot;
use TruckersMP\APIClient\Requests\Request;

class SlotIndexRequest extends Request
{
    /**
     * The ID of the requested event.
     *
     * @var int
     */
    protected int $eventId;

    /**
     * Create a new SlotIndexRequest instance.
     *
     * @param  Client  $client
     * @param  int  $id
     * @return void
     */
    public function __construct(Client $client, int $id)
    {
        parent::__construct($client);

        $this->eventId = $id;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'events/' . $this->eventId . '/slots';
    }

    /**
     * Get the data for the request.
     *
     * @return Collection|EventSlot[]
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): Collection
    {
        return (new Collection($this->send()['response']))
            ->map(fn (array $slot) => new EventSlot($this->client, $slot));
    }
}
