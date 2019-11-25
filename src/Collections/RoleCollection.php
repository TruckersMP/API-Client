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

        foreach ($response['roles'] as $key => $role) {
            $this->items[$key] = new CompanyRole($role);
        }
    }
}
