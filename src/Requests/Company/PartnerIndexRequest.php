<?php

namespace TruckersMP\APIClient\Requests\Company;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Client;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\CompanyPartnershipIndex;
use TruckersMP\APIClient\Requests\Request;

class PartnerIndexRequest extends Request
{
    /**
     * The ID or slug of the requested company.
     *
     * @var string|int
     */
    protected $companyKey;

    /**
     * Create a new PartnerIndexRequest instance.
     *
     * @param  Client  $client
     * @param  string|int  $companyKey
     * @return void
     */
    public function __construct(Client $client, $companyKey)
    {
        parent::__construct($client);

        $this->companyKey = $companyKey;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyKey . '/partners';
    }

    /**
     * Get the data for the request.
     *
     * @return CompanyPartnershipIndex
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): CompanyPartnershipIndex
    {
        return new CompanyPartnershipIndex(
            $this->client,
            $this->send()['response']
        );
    }
}
