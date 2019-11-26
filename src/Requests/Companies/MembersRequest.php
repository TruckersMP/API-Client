<?php

namespace TruckersMP\Requests\Companies;

use TruckersMP\Collections\MemberCollection;
use TruckersMP\Models\CompanyMemberIndex;
use TruckersMP\Requests\Request;

class MembersRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var int
     */
    protected $companyId;

    /**
     * Create a new MembersRequest instance.
     *
     * @param  array  $config
     * @param  int  $id
     */
    public function __construct(array $config, int $id)
    {
        parent::__construct($config);

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
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function get(): CompanyMemberIndex
    {
        return new CompanyMemberIndex(
            $this->send()['response']
        );
    }
}
