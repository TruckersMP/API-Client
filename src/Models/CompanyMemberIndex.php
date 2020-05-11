<?php

namespace TruckersMP\APIClient\Models;

use Exception;
use TruckersMP\APIClient\Collections\Company\MemberCollection;

class CompanyMemberIndex
{
    /**
     * The company members.
     *
     * @var MemberCollection
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
     * @param  array  $response
     * @return void
     *
     * @throws Exception
     */
    public function __construct(array $response)
    {
        $this->members = new MemberCollection($response['members']);

        $this->count = $response['members_count'];
    }

    /**
     * Get the collection of company members.
     *
     * @return MemberCollection
     */
    public function getMembers(): MemberCollection
    {
        return $this->members;
    }

    /**
     * Get the member count for the company.
     *
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }
}
