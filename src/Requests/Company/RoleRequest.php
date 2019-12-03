<?php

namespace TruckersMP\Requests\Company;

use TruckersMP\Models\CompanyRole;
use TruckersMP\Requests\Request;

class RoleRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var int
     */
    protected $companyId;

    /**
     * The ID of the requested role.
     *
     * @var int
     */
    protected $roleId;

    /**
     * Create a new RolesRequest instance.
     *
     * @param int $companyId
     * @param int $roleId
     */
    public function __construct(int $companyId, int $roleId)
    {
        parent::__construct();

        $this->companyId = $companyId;
        $this->roleId = $roleId;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyId . '/role/' . $this->roleId;
    }

    /**
     * Get the data for the request.
     *
     * @return CompanyRole
     *
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function get(): CompanyRole
    {
        return new CompanyRole(
            $this->send()['response']
        );
    }
}
