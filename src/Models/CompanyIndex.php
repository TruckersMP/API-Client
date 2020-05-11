<?php

namespace TruckersMP\APIClient\Models;

use Exception;
use TruckersMP\APIClient\Collections\CompanyCollection;

class CompanyIndex
{
    /**
     * The recently created companies.
     *
     * @var CompanyCollection
     */
    protected $recent;

    /**
     * The featured companies.
     *
     * @var CompanyCollection
     */
    protected $featured;

    /**
     * The featured companies on the cover page.
     *
     * @var CompanyCollection
     */
    protected $featuredCovered;

    /**
     * Create a new CompanyIndex instance.
     *
     * @param  array  $response
     * @return void
     *
     * @throws Exception
     */
    public function __construct(array $response)
    {
        $this->recent = new CompanyCollection($response['recent']);

        $this->featured = new CompanyCollection($response['featured']);

        $this->featuredCovered = new CompanyCollection($response['featured_cover']);
    }

    /**
     * Get the last 4 companies created.
     *
     * @return CompanyCollection
     */
    public function getRecent(): CompanyCollection
    {
        return $this->recent;
    }

    /**
     * Get the featured companies on the VTC page.
     *
     * @return CompanyCollection
     */
    public function getFeatured(): CompanyCollection
    {
        return $this->featured;
    }

    /**
     * Get the companies with featured cover images on the VTC page.
     *
     * @return CompanyCollection
     */
    public function getFeaturedCovered(): CompanyCollection
    {
        return $this->featuredCovered;
    }
}
