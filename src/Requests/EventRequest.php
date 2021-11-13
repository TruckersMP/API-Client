<?php

namespace TruckersMP\APIClient\Requests;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\Event;

class EventRequest extends Request
{
    /**
     * The ID of the requested event.
     *
     * @var int
     */
    protected $id;

    /**
     * Create a new EventRequest instance.
     *
     * @param  int  $id
     * @return void
     */
    public function __construct(int $id)
    {
        parent::__construct();

        $this->id = $id;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'events/' . $this->id;
    }

    /**
     * Get the data for the request.
     *
     * @return Event
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): Event
    {
        return new Event(
            $this->send()['response']
        );
    }
}
