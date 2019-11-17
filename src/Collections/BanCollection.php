<?php

namespace TruckersMP\Collections;

use TruckersMP\Models\Ban;

class BanCollection extends Collection
{
    /**
     * Create a new BanCollection instance.
     *
     * @param  array  $response
     */
    public function __construct(array $response)
    {
        $this->position = 0;

        // handle error

        foreach ($response['response'] as $key => $ban) {
            $this->collection[$key] = new Ban($ban);
        }
    }

    /**
     * Get the players bans.
     *
     * @param  int|null  $index
     * @return Ban[]
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function getBans(?int $index = null): array
    {
        return $this->getValue($index);
    }
}
