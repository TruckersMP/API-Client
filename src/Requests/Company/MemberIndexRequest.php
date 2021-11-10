<?php

namespace TruckersMP\APIClient\Requests\Company;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\CompanyMemberIndex;
use TruckersMP\APIClient\Requests\Request;

class MemberIndexRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var string|int
     */
    protected $companyId;

    /**
     * Create a new MemberIndexRequest instance.
     *
     * @param  string|int  $id
     * @return void
     */
    public function __construct(string $id)
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
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): CompanyMemberIndex
    {
        return new CompanyMemberIndex(
            $this->send()['response']
        );
    }
}
