<?php

namespace TruckersMP\APIClient\Requests\Company;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\CompanyMemberIndex;
use TruckersMP\APIClient\Requests\Request;

class MemberIndexRequest extends Request
{
    /**
     * The ID or slug of the requested company.
     *
     * @var string|int
     */
    protected $companyKey;

    /**
     * Create a new MemberIndexRequest instance.
     *
     * @param  string|int  $companyKey
     * @return void
     */
    public function __construct(string $companyKey)
    {
        parent::__construct();

        $this->companyKey = $companyKey;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyKey . '/members';
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

    /**
     * Get the members within the company that are currently banned.
     *
     * @return BanIndexRequest
     */
    public function bans(): BanIndexRequest
    {
        return new BanIndexRequest(
            $this->companyId
        );
    }
}
