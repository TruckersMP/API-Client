<?php

namespace TruckersMP\Collections;

use TruckersMP\Models\CompanyMember;

class MemberCollection extends Collection
{
    /*
     * Create a new MemberCollection instance.
     *
     * @return void
     */
    public function __construct(array $response)
    {
        parent::__construct();

        foreach ($response as $key => $member) {
            $this->items[$key] = new CompanyMember($member);
        }
    }
}
