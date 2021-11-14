<?php

namespace TruckersMP\APIClient\Models;

use Illuminate\Support\Collection;

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
     */
    public function __construct(array $response)
    {
        $this->members = (new Collection($response['members']))
            ->mapInto(CompanyMember::class);

        $this->count = $response['members_count'];
    }

    /**
     * Get the collection of company members.
     *
     * @return Collection
     */
    public function getMembers(): Collection
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
