<?php

namespace TruckersMP\Requests;

use TruckersMP\Models\Company;
use TruckersMP\Requests\Company\MemberIndexRequest;
use TruckersMP\Requests\Company\MemberRequest;
use TruckersMP\Requests\Company\PostIndexRequest;
use TruckersMP\Requests\Company\PostRequest;
use TruckersMP\Requests\Company\RoleIndexRequest;
use TruckersMP\Requests\Company\RoleRequest;

class CompanyRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var int
     */
    protected $id;

    /**
     * Create a new CompanyRequest instance.
     *
     * @param int $id
     */
    public function __construct(int $id)
    {
        parent::__construct();

        $this->id = $id;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->id;
    }

    /**
     * Get the data for the request.
     *
     * @return Company
     *
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     * @throws \Exception
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
     * @return \TruckersMP\Requests\Company\PostIndexRequest
     */
    public function posts(): PostIndexRequest
    {
        return new PostIndexRequest(
            $this->id
        );
    }

    /**
     * Get the post for the company with the specified ID.
     *
     * @param int $id
     *
     * @return \TruckersMP\Requests\Company\PostRequest
     */
    public function post(int $id): PostRequest
    {
        return new PostRequest(
            $this->id,
            $id
        );
    }

    /**
     * Get the roles for the company.
     *
     * @return \TruckersMP\Requests\Company\RoleIndexRequest
     */
    public function roles(): RoleIndexRequest
    {
        return new RoleIndexRequest(
            $this->id
        );
    }

    /**
     * Get the requested company role.
     *
     * @param int $id
     *
     * @return \TruckersMP\Requests\Company\RoleRequest
     */
    public function role(int $id): RoleRequest
    {
        return new RoleRequest(
            $this->id,
            $id
        );
    }

    /**
     * Get the members for the company.
     *
     * @return \TruckersMP\Requests\Company\MemberIndexRequest
     */
    public function members(): MemberIndexRequest
    {
        return new MemberIndexRequest(
            $this->id
        );
    }

    /**
     * Get the requested company member.
     *
     * @param int $id
     *
     * @return \TruckersMP\Requests\Company\MemberRequest
     */
    public function member(int $id): MemberRequest
    {
        return new MemberRequest(
            $this->id,
            $id
        );
    }
}
