<?php

namespace TruckersMP\Requests\Company;

use TruckersMP\Collections\PostsCollection;
use TruckersMP\Requests\Request;

class PostIndexRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var int
     */
    protected $companyId;

    /**
     * Create a new PostIndexRequest instance.
     *
     * @param int $companyId
     */
    public function __construct(int $companyId)
    {
        parent::__construct();

        $this->companyId = $companyId;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyId . '/news';
    }

    /**
     * Get the data for the request.
     *
     * @return PostsCollection|\TruckersMP\Models\CompanyPost[]
     *
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function get(): PostsCollection
    {
        return new PostsCollection(
            $this->send()['response']
        );
    }
}
