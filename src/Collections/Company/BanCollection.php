<?php

namespace TruckersMP\APIClient\Collections\Company;

use TruckersMP\APIClient\Collections\Collection;
use TruckersMP\APIClient\Models\CompanyBan;

class BanCollection extends Collection
{
    /**
     * Create a new BanCollection instance.
     *
     * @param  array  $response
     * @return void
     */
    public function __construct(array $response)
    {
        parent::__construct();

        foreach ($response['members'] as $key => $ban) {
            $this->items[$key] = new CompanyBan($ban);
        }
    }
}
