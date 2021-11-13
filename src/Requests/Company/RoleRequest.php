<?php

namespace TruckersMP\APIClient\Requests\Company;

use Psr\Http\Client\ClientExceptionInterface;
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
    protected $roleId;

    /**
     * Create a new RoleRequest instance.
     *
     * @param  int  $companyKey
     * @param  int  $roleId
     * @return void
     */
    public function __construct(int $companyKey, int $roleId)
    {
        parent::__construct();

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
            $this->send()['response']
        );
    }
}
