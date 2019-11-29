<?php

namespace TruckersMP\Requests;

use TruckersMP\Models\Player;

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
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
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
     * @return \TruckersMP\Requests\BanRequest
     */
    public function bans(): BanRequest
    {
        return new BanRequest(
            $this->id
        );
    }
}
