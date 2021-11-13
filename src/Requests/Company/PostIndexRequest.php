<?php

namespace TruckersMP\APIClient\Requests\Company;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Collections\Company\PostCollection;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\CompanyPost;
use TruckersMP\APIClient\Requests\Request;

class PostIndexRequest extends Request
{
    /**
     * The ID or slug of the requested company.
     *
     * @var string|int
     */
    protected $companyKey;

    /**
     * Create a new PostIndexRequest instance.
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
        return 'vtc/' . $this->companyKey . '/news';
    }

    /**
     * Get the data for the request.
     *
     * @return PostCollection|CompanyPost[]
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): PostCollection
    {
        return new PostCollection(
            $this->send()['response']
        );
    }
}
