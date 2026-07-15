<?php

namespace TruckersMP\APIClient\Models;

use Illuminate\Support\Collection;
use TruckersMP\APIClient\Client;

class CompanyPartnershipIndex
{
    /**
     * The accepted partnerships of the company.
     *
     * @var Collection
     */
    protected Collection $partners;

    /**
     * The number of pending partnership requests involving the company.
     *
     * @var int
     */
    protected int $pendingRequestsCount;

    /**
     * Create a new CompanyPartnershipIndex instance.
     *
     * @param  Client  $client
     * @param  array  $response
     * @return void
     */
    public function __construct(Client $client, array $response)
    {
        $this->partners = (new Collection($response['partners']))
            ->map(fn (array $partnership) => new CompanyPartnership($client, $partnership));

        $this->pendingRequestsCount = $response['pending_requests_count'] ?? 0;
    }

    /**
     * Get the collection of accepted company partnerships.
     *
     * @return Collection
     */
    public function getPartners(): Collection
    {
        return $this->partners;
    }

    /**
     * Get the number of pending partnership requests involving the company.
     *
     * @return int
     */
    public function getPendingRequestsCount(): int
    {
        return $this->pendingRequestsCount;
    }
}
