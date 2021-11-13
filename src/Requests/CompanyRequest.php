<?php

namespace TruckersMP\APIClient\Requests;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\Company;
use TruckersMP\APIClient\Requests\Company\EventIndexRequest;
use TruckersMP\APIClient\Requests\Company\EventRequest;
use TruckersMP\APIClient\Requests\Company\MemberIndexRequest;
use TruckersMP\APIClient\Requests\Company\MemberRequest;
use TruckersMP\APIClient\Requests\Company\PostIndexRequest;
use TruckersMP\APIClient\Requests\Company\PostRequest;
use TruckersMP\APIClient\Requests\Company\RoleIndexRequest;
use TruckersMP\APIClient\Requests\Company\RoleRequest;

class CompanyRequest extends Request
{
    /**
     * The ID or slug of the requested company.
     *
     * @var string|int
     */
    protected $key;

    /**
     * Create a new CompanyRequest instance.
     *
     * @param  string|int  $key
     * @return void
     */
    public function __construct(string $key)
    {
        parent::__construct();

        $this->key = $key;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->key;
    }

    /**
     * Get the data for the request.
     *
     * @return Company
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): Company
    {
        return new Company(
            $this->send()['response']
        );
    }

    /**
     * Get the news posts for the company.
     *
     * @return PostIndexRequest
     */
    public function posts(): PostIndexRequest
    {
        return new PostIndexRequest(
            $this->key
        );
    }

    /**
     * Get the post for the company with the specified ID.
     *
     * @param  int  $id
     * @return PostRequest
     */
    public function post(int $id): PostRequest
    {
        return new PostRequest(
            $this->key,
            $id
        );
    }

    /**
     * Get the roles for the company.
     *
     * @return RoleIndexRequest
     */
    public function roles(): RoleIndexRequest
    {
        return new RoleIndexRequest(
            $this->key
        );
    }

    /**
     * Get the requested company role.
     *
     * @param  int  $id
     * @return RoleRequest
     */
    public function role(int $id): RoleRequest
    {
        return new RoleRequest(
            $this->key,
            $id
        );
    }

    /**
     * Get the members for the company.
     *
     * @return MemberIndexRequest
     */
    public function members(): MemberIndexRequest
    {
        return new MemberIndexRequest(
            $this->key
        );
    }

    /**
     * Get the requested company member.
     *
     * @param  int  $id
     * @return MemberRequest
     */
    public function member(int $id): MemberRequest
    {
        return new MemberRequest(
            $this->key,
            $id
        );
    }

    /**
     * Get the events for the company.
     *
     * @return EventIndexRequest
     */
    public function events(): EventIndexRequest
    {
        return new EventIndexRequest(
            $this->id
        );
    }

    /**
     * Get the event for the company with the specified ID.
     *
     * @param  int  $id
     * @return EventRequest
     */
    public function event(int $id): EventRequest
    {
        return new EventRequest(
            $this->id,
            $id
        );
    }
}
