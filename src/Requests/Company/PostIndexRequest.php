<?php

namespace TruckersMP\APIClient\Requests\Company;

use TruckersMP\APIClient\Collections\Company\PostCollection;
use TruckersMP\APIClient\Requests\Request;

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
     * @return PostCollection|\TruckersMP\APIClient\Models\CompanyPost[]
     *
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\APIClient\Exceptions\PageNotFoundException
     * @throws \TruckersMP\APIClient\Exceptions\RequestException
     */
    public function get(): PostCollection
    {
        return new PostCollection(
            $this->send()['response']
        );
    }
}
