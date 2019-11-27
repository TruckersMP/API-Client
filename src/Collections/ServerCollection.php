<?php

namespace TruckersMP\Collections;

use TruckersMP\Models\Server;

class ServerCollection extends Collection
{
    /**
     * Create a new Collection instance.
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
