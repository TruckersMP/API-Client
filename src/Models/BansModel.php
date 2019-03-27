<?php

namespace TruckersMP\Models;

use TruckersMP\Exceptions\PlayerNotFoundException;
use Vent\VentTrait;

class BansModel extends GroupedModel
{
    use VentTrait;

    /**
     * Array of bans.
     *
     * @var array
     */
    public $bans = [];

    /**
     * BansModel constructor.
     *
     * @param array $response
     *
     * @throws \TruckersMP\Exceptions\PlayerNotFoundException
     */
    public function __construct(array $response)
    {
        $this->position = 0;

        if ($response['error'] &&
            ($response['descriptor'] == 'No player ID submitted' ||
                $response['descriptor'] == 'Invalid user ID')
        ) {
            throw new PlayerNotFoundException($response['descriptor']);
        }

        foreach ($response['response'] as $k => $ban) {
            $this->bans[$k] = new BanModel($ban);
        }

        $this->groupedValue = $this->bans;
    }
}
