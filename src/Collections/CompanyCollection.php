<?php

namespace TruckersMP\Collections;

use TruckersMP\Models\Company;

class CompanyCollection extends Collection
{
    /**
     * Create a new CompanyCollection instance.
     *
     * @param array $response
     * @param string $type
     */
    public function __construct(array $response, string $type)
    {
        parent::__construct();

        // TODO: handle any errors or exceptions

        foreach ($response['response'][$type] as $key => $company) {
            $this->items[$key] = new Company($company);
        }
    }
}
