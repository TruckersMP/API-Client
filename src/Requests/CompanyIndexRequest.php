<?php

namespace TruckersMP\APIClient\Requests;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
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
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): CompanyIndex
    {
        return new CompanyIndex(
            $this->client,
            $this->send()['response']
        );
    }
}
