<?php

namespace TruckersMP\APIClient\Collections\Company;

use TruckersMP\APIClient\Collections\Collection;
use TruckersMP\APIClient\Models\CompanyMember;

class MemberCollection extends Collection
{
    /**
     * Create a new MemberCollection instance.
     *
     * @param  array  $response
     * @retrun void
     */
    public function __construct(array $response)
    {
        parent::__construct();

        foreach ($response as $key => $member) {
            $this->items[$key] = new CompanyMember($member);
        }
    }
}
