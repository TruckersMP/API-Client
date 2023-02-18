<?php

namespace TruckersMP\APIClient\Models;

use Illuminate\Support\Collection;
use TruckersMP\APIClient\Client;

class CompanyIndex
{
    /**
     * The recently created companies.
     *
     * @var Collection
     */
    protected Collection $recent;

    /**
     * The featured companies.
     *
     * @var Collection
     */
    protected Collection $featured;

    /**
     * The featured companies on the cover page.
     *
     * @var Collection
     */
    protected Collection $featuredCovered;

    /**
     * Create a new CompanyIndex instance.
     *
     * @param  Client  $client
     * @param  array  $response
     * @return void
     */
    public function __construct(Client $client, array $response)
    {
        $mapCompany = fn (array $company) => new Company($client, $company);

        $this->recent = (new Collection($response['recent']))->map($mapCompany);
        $this->featured = (new Collection($response['featured']))->map($mapCompany);
        $this->featuredCovered = (new Collection($response['featured_cover']))->map($mapCompany);
    }

    /**
     * Get the last 4 companies created.
     *
     * @return Collection
     */
    public function getRecent(): Collection
    {
        return $this->recent;
    }

    /**
     * Get the featured companies on the VTC page.
     *
     * @return Collection
     */
    public function getFeatured(): Collection
    {
        return $this->featured;
    }

    /**
     * Get the companies with featured cover images on the VTC page.
     *
     * @return Collection
     */
    public function getFeaturedCovered(): Collection
    {
        return $this->featuredCovered;
    }
}
