<?php

namespace TruckersMP\Requests\Companies;

use TruckersMP\Collections\RoleCollection;
use TruckersMP\Requests\Request;

class RolesRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var int
     */
    protected $companyId;

    /**
     * Create a new RolesRequest instance.
     *
     * @param array $config
     * @param int $companyId
     */
    public function __construct(array $config, int $companyId)
    {
        parent::__construct($config);

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
     * @return RoleCollection|\TruckersMP\Models\CompanyRole[]
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function get(): RoleCollection
    {
        return new RoleCollection(
            $this->send()['response']
        );
    }
}
