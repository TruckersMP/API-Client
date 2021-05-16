<?php

namespace TruckersMP\APIClient\Requests;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\Player;

class PlayerRequest extends Request
{
    /**
     * The ID of the requested player.
     *
     * @var int
     */
    protected $id;

    /**
     * Create a new PlayerRequest instance.
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
        return 'player/' . $this->id;
    }

    /**
     * Get the data for the request.
     *
     * @return Player
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): Player
    {
        return new Player(
            $this->send()['response']
        );
    }

    /**
     * Get the players bans.
     *
     * @return BanRequest
     */
    public function bans(): BanRequest
    {
        return new BanRequest(
            $this->id
        );
    }
}
