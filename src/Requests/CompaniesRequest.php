<?php

namespace TruckersMP\Requests;

use TruckersMP\Collections\CompanyCollection;

class CompaniesRequest extends Request
{
    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc';
    }

    /**
     * Get the data for the request.
     *
     *
     * @return mixed
     */
    public function get()
    {
        // TODO: Implement get() method.
    }

    /**
     * Get the recent companies.
     *
     * @return \TruckersMP\Collections\CompanyCollection
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function recent(): CompanyCollection
    {
        return new CompanyCollection(
            $this->send(),
            'recent'
        );
    }

    /**
     * Get the featured companies.
     *
     * @return \TruckersMP\Collections\CompanyCollection
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function featured(): CompanyCollection
    {
        return new CompanyCollection(
            $this->send(),
            'featured'
        );
    }
}
