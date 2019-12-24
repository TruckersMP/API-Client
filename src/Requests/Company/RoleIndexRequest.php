<?php

namespace TruckersMP\APIClient\Requests\Company;

use TruckersMP\APIClient\Collections\Company\RoleCollection;
use TruckersMP\APIClient\Requests\Request;

class RoleIndexRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var int
     */
    protected $companyId;

    /**
     * Create a new RoleIndexRequest instance.
     *
     * @param int $companyId
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
        return 'vtc/' . $this->companyId . '/roles';
    }

    /**
     * Get the data for the request.
     *
     * @return \TruckersMP\APIClient\Collections\Company\RoleCollection
     *
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\APIClient\Exceptions\PageNotFoundException
     * @throws \TruckersMP\APIClient\Exceptions\RequestException
     * @throws \Exception
     */
    public function get(): RoleCollection
    {
        return new RoleCollection(
            $this->send()['response']
        );
    }
}
