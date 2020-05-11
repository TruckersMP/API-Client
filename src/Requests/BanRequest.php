<?php

namespace TruckersMP\APIClient\Requests;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Collections\BanCollection;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;

class BanRequest extends Request
{
    /**
     * The id of player to get bans for.
     *
     * @var int
     */
    protected $id;

    /**
     * Create a new BanRequest instance.
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
        return 'bans/' . $this->id;
    }

    /**
     * Get the data for the request.
     *
     * @return BanCollection
     *
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws Exception
     * @throws ClientExceptionInterface
     */
    public function get(): BanCollection
    {
        return new BanCollection(
            $this->send()['response']
        );
    }
}
