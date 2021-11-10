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
     * The ID of the requested company.
     *
     * @var string|int
     */
    protected $companyId;

    /**
     * Create a new RoleIndexRequest instance.
     *
     * @param  string|int  $companyId
     * @return void
     */
    public function __construct(string $companyId)
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
        return 'vtc/' . $this->companyId . '/roles';
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
