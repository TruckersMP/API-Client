<?php

namespace TruckersMP\APIClient\Requests\Company;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Collections\Company\RoleCollection;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
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
     * @return RoleCollection
     *
     * @throws Exception
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): RoleCollection
    {
        return new RoleCollection(
            $this->send()['response']
        );
    }
}
