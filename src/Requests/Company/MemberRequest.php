<?php

namespace TruckersMP\APIClient\Requests\Company;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
use TruckersMP\APIClient\Models\CompanyMember;
use TruckersMP\APIClient\Requests\Request;

class MemberRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var int
     */
    protected $companyId;

    /**
     * The ID of the requested member.
     *
     * @var int
     */
    protected $memberId;

    /**
     * Create a new MemberRequest instance.
     *
     * @param  int  $companyId
     * @param  int  $memberId
     * @return void
     */
    public function __construct(int $companyId, int $memberId)
    {
        parent::__construct();

        $this->companyId = $companyId;
        $this->memberId = $memberId;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyId . '/member/' . $this->memberId;
    }

    /**
     * Get the data for the request.
     *
     * @return mixed
     *
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws Exception
     * @throws ClientExceptionInterface
     */
    public function get(): CompanyMember
    {
        return new CompanyMember(
            $this->send()['response']
        );
    }
}
