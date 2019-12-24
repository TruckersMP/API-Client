<?php

namespace TruckersMP\APIClient\Models;

use TruckersMP\APIClient\Collections\CompanyCollection;

class CompanyIndex
{
    /**
     * The recently created companies.
     *
     * @var \TruckersMP\Collections\CompanyCollection
     */
    protected $recent;

    /**
     * The featured companies.
     *
     * @var \TruckersMP\Collections\CompanyCollection
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
     * @param array $response
     *
     * @throws \Exception
     */
    public function __construct(array $response)
    {
        $this->recent = new CompanyCollection($response['recent']);

        $this->featured = new CompanyCollection($response['featured']);

        $this->featuredCovered = new CompanyCollection($response['featured_cover']);
    }

    /**
     * @return \TruckersMP\Collections\CompanyCollection
     */
    public function getRecent(): CompanyCollection
    {
        return $this->recent;
    }

    /**
     * @return \TruckersMP\Collections\CompanyCollection
     */
    public function getFeatured(): CompanyCollection
    {
        return $this->featured;
    }

    /**
     * @return \TruckersMP\Collections\CompanyCollection
     */
    public function getFeaturedCovered(): CompanyCollection
    {
        return $this->featuredCovered;
    }
}
