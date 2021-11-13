<?php

namespace TruckersMP\APIClient\Collections;

use TruckersMP\APIClient\Models\Dlc;

class DlcCollection extends Collection
{
    /**
     * Create a new DlcCollection instance.
     *
     * @param array $response
     * @return void
     */
    public function __construct(array $response)
    {
        parent::__construct();

        foreach ($response as $key => $dlc) {
            $this->items[$key] = new Dlc($key, $dlc);
        }
    }
}
