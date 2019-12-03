<?php

namespace TruckersMP\APIClient\Requests;

use TruckersMP\APIClient\Models\CompanyIndex;

class CompanyIndexRequest extends Request
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
     *
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\APIClient\Exceptions\PageNotFoundException
     * @throws \TruckersMP\APIClient\Exceptions\RequestException
     */
    public function get(): CompanyIndex
    {
        return new CompanyIndex(
            $this->send()['response']
        );
    }
}
