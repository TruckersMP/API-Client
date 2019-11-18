<?php

namespace TruckersMP\Collections;

use TruckersMP\Models\Company;

class CompanyCollection
{
    /**
     * The recently created companies.
     *
     * @var Company[]
     */
    protected $recentCompanies;

    /**
     * The featured companies.
     *
     * @var Company[]
     */
    protected $featuredCompanies;

    /**
     * Create a new CompanyCollection instance.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        // TODO: handle any errors / exceptions

        foreach ($response['response']['recent'] as $key => $recentCompany) {
            $this->recentCompanies[$key] = new Company($recentCompany);
        }

        foreach ($response['response']['featured'] as $key => $featuredCompany) {
            $this->featuredCompanies[$key] = new Company($featuredCompany);
        }
    }

    /**
     * Get the recent companies.
     *
     * @return Company[]
     */
    public function getRecent()
    {
        return $this->recentCompanies;
    }

    /**
     * Get the featured companies.
     *
     * @return Company[]
     */
    public function getFeatured()
    {
        return $this->featuredCompanies;
    }
}
