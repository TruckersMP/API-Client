<?php

namespace TruckersMP\Collections;

use TruckersMP\Models\CompanyRole;

class RoleCollection extends Collection
{
    /**
     * Create a new Collection instance.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        parent::__construct();

        // TODO: handle any errors or exceptions

        foreach ($response['response']['roles'] as $key => $role) {
            $this->items[$key] = new CompanyRole($role);
        }
    }
}
