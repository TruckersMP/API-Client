<?php

namespace TruckersMP\Requests;

use TruckersMP\Models\Ban;

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
        return 'bans/' . $this->id;
    }

    /**
     * Get the data for the request.
     *
     * @return \TruckersMP\Models\Ban[]
     * @throws \Http\Client\Exception
     */
    public function get(): array
    {
        $bans = [];
        $results = $this->call();

        // TODO: handle any errors / exceptions

        foreach ($results['response'] as $key => $ban) {
            $bans[$key] = new Ban($ban);
        }

        return $bans;
    }
}
