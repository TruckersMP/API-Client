<?php

namespace TruckersMP\Collections;

use TruckersMP\Models\Company;

class CompanyCollection extends Collection
{
    /**
     * Create a new Collection instance.
     *
     * @param array $companies
     *
     * @throws \Exception
     */
    public function __construct(array $companies)
    {
        parent::__construct();

        foreach ($companies as $key => $company) {
            $this->items[$key] = new Company($company);
        }
    }
}
