<?php

namespace TruckersMP\APIClient\Requests\Company;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Collections\Company\BanCollection;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\CompanyBan;
use TruckersMP\APIClient\Requests\Request;

class BanIndexRequest extends Request
{
    /**
     * The ID or slug of the requested company.
     *
     * @var string|int
     */
    protected $companyKey;

    /**
     * Create a new BanIndexRequest instance.
     *
     * @param  string|int  $companyKey
     * @return void
     */
    public function __construct(string $companyKey)
    {
        parent::__construct();

        $this->companyKey = $companyKey;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyKey . '/members/banned';
    }

    /**
     * Get the data for the request.
     *
     * @return BanCollection|CompanyBan[]
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): BanCollection
    {
        return new BanCollection(
            $this->send()['response']
        );
    }
}
