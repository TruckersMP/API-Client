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
     * @param array $config
     * @param int $id
     */
    public function __construct(array $config, int $id)
    {
        parent::__construct($config);

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
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function get(): Player
    {
        return new Player(
            $this->call()
        );
    }
}
