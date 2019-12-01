<?php

namespace TruckersMP\Collections;

use TruckersMP\Models\CompanyRole;

class RoleCollection extends Collection
{
    /**
     * Create a new RoleCollection instance.
     *
     * @param array $response
     *
     * @throws \Exception
     */
    public function __construct(array $response)
    {
        parent::__construct();

        foreach ($response['roles'] as $key => $role) {
            $this->items[$key] = new CompanyRole($role);
        }
    }
}
