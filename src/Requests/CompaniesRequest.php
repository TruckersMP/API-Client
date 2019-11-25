<?php

namespace TruckersMP\Requests;

use TruckersMP\Models\CompanyIndex;

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
     * @return mixed
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function get(): CompanyIndex
    {
        return new CompanyIndex(
            $this->send()['response']
        );
    }
}
