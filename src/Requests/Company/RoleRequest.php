<?php

namespace TruckersMP\APIClient\Requests\Company;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Client;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\CompanyRole;
use TruckersMP\APIClient\Requests\Request;

class RoleRequest extends Request
{
    /**
     * The ID or slug of the requested company.
     *
     * @var string|int
     */
    protected $companyKey;

    /**
     * The ID of the requested role.
     *
     * @var int
     */
    protected int $roleId;

    /**
     * Create a new RoleRequest instance.
     *
     * @param  Client  $client
     * @param  string|int  $companyKey
     * @param  int  $roleId
     * @return void
     */
    public function __construct(Client $client, $companyKey, int $roleId)
    {
        parent::__construct($client);

        $this->companyKey = $companyKey;
        $this->roleId = $roleId;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyKey . '/role/' . $this->roleId;
    }

    /**
     * Get the data for the request.
     *
     * @return CompanyRole
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): CompanyRole
    {
        return new CompanyRole(
            $this->client,
            $this->send()['response']
        );
    }
}
