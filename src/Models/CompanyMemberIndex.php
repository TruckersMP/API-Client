<?php

namespace TruckersMP\APIClient\Models;

use Illuminate\Support\Collection;
use TruckersMP\APIClient\Client;

class CompanyMemberIndex
{
    /**
     * The company members.
     *
     * @var Collection
     */
    protected Collection $members;

    /**
     * The number of members in the company.
     *
     * @var int
     */
    protected int $count;

    /**
     * Create a new CompanyMemberIndex instance.
     *
     * @param  Client  $client
     * @param  array  $response
     * @return void
     */
    public function __construct(Client $client, array $response)
    {
        $this->members = (new Collection($response['members']))
            ->map(fn (array $member) => new CompanyMember($client, $member));

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
