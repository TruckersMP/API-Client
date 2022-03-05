<?php

namespace TruckersMP\APIClient\Requests\Company;

use Illuminate\Support\Collection;
use Psr\Http\Client\ClientExceptionInterface;
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
     * @return Collection|CompanyBan[]
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): Collection
    {
        return (new Collection($this->send()['response']['members']))
            ->mapInto(CompanyBan::class);
    }
}