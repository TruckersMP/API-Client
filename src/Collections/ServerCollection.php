<?php

namespace TruckersMP\Collections;

use TruckersMP\Models\Server;

class ServerCollection extends Collection
{
    /**
     * Create a new ServerCollection instance.
     *
     * @param  array  $response
     */
    public function __construct(array $response)
    {
        $this->position = 0;

        // TODO: handle any errors / exceptions

        foreach ($response['response'] as $key => $server) {
            $this->collection[$key] = new Server($server);
        }
    }

    /**
     * Get the servers.
     *
     * @param  int|null  $index
     * @return Server[]
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function getServers(?int $index = null): array
    {
        return $this->getValue($index);
    }
}
