<?php

namespace TruckersMP\APIClient\Requests\Company;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Client;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\CompanyMember;
use TruckersMP\APIClient\Requests\Request;

class MemberRequest extends Request
{
    /**
     * The ID or slug of the requested company.
     *
     * @var string|int
     */
    protected $companyKey;

    /**
     * The ID of the requested member.
     *
     * @var int
     */
    protected int $memberId;

    /**
     * Create a new MemberRequest instance.
     *
     * @param  Client  $client
     * @param  string|int  $companyKey
     * @param  int  $memberId
     * @return void
     */
    public function __construct(Client $client, string $companyKey, int $memberId)
    {
        parent::__construct($client);

        $this->companyKey = $companyKey;
        $this->memberId = $memberId;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyKey . '/member/' . $this->memberId;
    }

    /**
     * Get the data for the request.
     *
     * @return mixed
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): CompanyMember
    {
        return new CompanyMember(
            $this->client,
            $this->send()['response']
        );
    }
}
