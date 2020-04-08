<?php

namespace TruckersMP\APIClient\Requests;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
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
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws Exception
     * @throws ClientExceptionInterface
     */
    public function get(): CompanyIndex
    {
        return new CompanyIndex(
            $this->send()['response']
        );
    }
}
