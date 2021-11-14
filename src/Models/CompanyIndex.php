<?php

namespace TruckersMP\APIClient\Models;

use Illuminate\Support\Collection;

class CompanyIndex
{
    /**
     * The recently created companies.
     *
     * @var Collection
     */
    protected $recent;

    /**
     * The featured companies.
     *
     * @var Collection
     */
    protected $featured;

    /**
     * The featured companies on the cover page.
     *
     * @var Collection
     */
    protected $featuredCovered;

    /**
     * Create a new CompanyIndex instance.
     *
     * @param  array  $response
     * @return void
     */
    public function __construct(array $response)
    {
        $this->recent = (new Collection($response['recent']))
            ->mapInto(Company::class);

        $this->featured = (new Collection($response['featured']))
            ->mapInto(Company::class);

        $this->featuredCovered = (new Collection($response['featured_cover']))
            ->mapInto(Company::class);
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
