<?php

namespace TruckersMP\Collections;

use TruckersMP\Models\Server;

class ServerCollection extends Collection
{
    /**
     * Create a new Collection instance
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        // TODO: handle any errors or exceptions

        foreach ($response['response'] as $key => $server) {
            $this->items[$key] = new Server($server);
        }
    }
}
