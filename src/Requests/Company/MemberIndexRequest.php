<?php

namespace TruckersMP\APIClient\Requests\Company;

use TruckersMP\APIClient\Models\CompanyMemberIndex;
use TruckersMP\APIClient\Requests\Request;

class MemberIndexRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var int
     */
    protected $companyId;

    /**
     * Create a new MemberIndexRequest instance.
     *
     * @param int $id
     */
    public function __construct(int $id)
    {
        parent::__construct();

        $this->companyId = $id;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyId . '/members';
    }

    /**
     * Get the data for the request.
     *
     * @return CompanyMemberIndex
     *
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\APIClient\Exceptions\PageNotFoundException
     * @throws \TruckersMP\APIClient\Exceptions\RequestException
     */
    public function get(): CompanyMemberIndex
    {
        return new CompanyMemberIndex(
            $this->send()['response']
        );
    }
}
