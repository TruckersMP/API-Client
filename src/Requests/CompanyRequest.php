<?php

namespace TruckersMP\Requests;

use TruckersMP\Models\Company;
use TruckersMP\Requests\Companies\MemberRequest;
use TruckersMP\Requests\Companies\MembersRequest;
use TruckersMP\Requests\Companies\PostRequest;
use TruckersMP\Requests\Companies\PostsRequest;
use TruckersMP\Requests\Companies\RoleRequest;
use TruckersMP\Requests\Companies\RolesRequest;

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
     * @return \TruckersMP\Requests\Companies\PostsRequest
     */
    public function posts(): PostsRequest
    {
        return new PostsRequest(
            $this->id
        );
    }

    /**
     * Get the post for the company with the specified ID.
     *
     * @param int $id
     *
     * @return \TruckersMP\Requests\Companies\PostRequest
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
     * @return \TruckersMP\Requests\Companies\RolesRequest
     */
    public function roles(): RolesRequest
    {
        return new RolesRequest(
            $this->id
        );
    }

    /**
     * Get the requested company role.
     *
     * @param int $id
     *
     * @return \TruckersMP\Requests\Companies\RoleRequest
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
     * @return \TruckersMP\Requests\Companies\MembersRequest
     */
    public function members(): MembersRequest
    {
        return new MembersRequest(
            $this->id
        );
    }

    /**
     * Get the requested company member.
     *
     * @param int $id
     *
     * @return \TruckersMP\Requests\Companies\MemberRequest
     */
    public function member(int $id): MemberRequest
    {
        return new MemberRequest(
            $this->id,
            $id
        );
    }
}
