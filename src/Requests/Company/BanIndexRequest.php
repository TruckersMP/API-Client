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
     * The ID of the requested company.
     *
     * @var int
     */
    protected $companyId;

    /**
     * Create a new BanIndexRequest instance.
     *
     * @param  int  $companyId
     * @return void
     */
    public function __construct(int $companyId)
    {
        parent::__construct();

        $this->companyId = $companyId;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyId . '/members/banned';
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
