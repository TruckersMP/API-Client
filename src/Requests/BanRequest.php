<?php

namespace TruckersMP\APIClient\Requests;

use Illuminate\Support\Collection;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Client;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\Ban;

class BanRequest extends Request
{
    /**
     * The id of player to get bans for.
     *
     * @var int
     */
    protected int $id;

    /**
     * Create a new BanRequest instance.
     *
     * @param  Client  $client
     * @param  int  $id
     * @return void
     */
    public function __construct(Client $client, int $id)
    {
        parent::__construct($client);

        $this->id = $id;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'bans/' . $this->id;
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
            ->map(fn (array $ban) => new Ban($this->client, $ban));
    }
}
