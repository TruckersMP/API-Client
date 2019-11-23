<?php

namespace TruckersMP\Requests;

use TruckersMP\Models\Company;
use TruckersMP\Requests\Companies\NewsRequest;
use TruckersMP\Requests\Companies\PostRequest;
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
     * The configuration to use for Guzzle.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Create a new CompanyRequest instance.
     *
     * @param array $config
     * @param int $id
     */
    public function __construct(array $config, int $id)
    {
        parent::__construct($config);

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
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function get(): Company
    {
        return new Company(
            $this->send()['responseW']
        );
    }

    /**
     * Get the news posts for the company.
     *
     * @return \TruckersMP\Requests\Companies\NewsRequest
     */
    public function posts(): NewsRequest
    {
        return new NewsRequest(
            $this->config,
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
            $this->config,
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
            $this->config,
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
            $this->config,
            $this->id,
            $id
        );
    }
}
