<?php

namespace TruckersMP\APIClient\Collections;

use TruckersMP\APIClient\Models\Server;

class ServerCollection extends Collection
{
    /**
     * Create a new ServerCollection instance.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        parent::__construct();

        foreach ($response as $key => $server) {
            $this->items[$key] = new Server($server);
        }
    }
}
