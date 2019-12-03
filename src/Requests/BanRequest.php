<?php

namespace TruckersMP\APIClient\Requests;

use TruckersMP\APIClient\Collections\BanCollection;

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
     * @param int $id
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
     * @return \TruckersMP\APIClient\Collections\BanCollection
     *
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\APIClient\Exceptions\PageNotFoundException
     * @throws \TruckersMP\APIClient\Exceptions\RequestException
     * @throws \Exception
     */
    public function get(): BanCollection
    {
        return new BanCollection(
            $this->send()['response']
        );
    }
}
