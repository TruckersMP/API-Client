<?php

namespace TruckersMP\APIClient\Requests\Company;

use Exception;
use Illuminate\Support\Collection;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\CompanyRole;
use TruckersMP\APIClient\Requests\Request;

class RoleIndexRequest extends Request
{
    /**
     * The ID or slug of the requested company.
     *
     * @var string|int
     */
    protected $companyKey;

    /**
     * Create a new RoleIndexRequest instance.
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
        return 'vtc/' . $this->companyKey . '/roles';
    }

    /**
     * Get the data for the request.
     *
     * @return Collection
     *
     * @throws Exception
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): Collection
    {
        return (new Collection($this->send()['response']['roles']))
            ->mapInto(CompanyRole::class);
    }
}
