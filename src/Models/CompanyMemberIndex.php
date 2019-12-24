<?php

namespace TruckersMP\APIClient\Models;

use TruckersMP\APIClient\Collections\Company\MemberCollection;

class CompanyMemberIndex
{
    /**
     * The company members.
     *
     * @var \TruckersMP\APIClient\Collections\MemberCollection
     */
    protected $members;

    /**
     * The number of members in the company.
     *
     * @var int
     */
    protected $count;

    /**
     * Create a new CompanyMemberIndex instance.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->members = new MemberCollection($response['members']);

        $this->count = $response['members_count'];
    }

    /**
     * @return \TruckersMP\APIClient\Collections\MemberCollection
     */
    public function getMembers(): MemberCollection
    {
        return $this->members;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }
}
