<?php

namespace TruckersMP\Models;

use TruckersMP\Exceptions\PlayerNotFoundException;

class BansModel extends GroupedModel
{
    /**
     * BansModel constructor.
     *
     * @param array $response
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
            $this->groupedValue[$k] = new BanModel($ban);
        }
    }

    /**
     * @param int|null $index
     * @return BanModel[]
     */
    public function getBans(?int $index = null): array
    {
        return $index ? $this->groupedValue[$index] : $this->groupedValue;
    }
}
