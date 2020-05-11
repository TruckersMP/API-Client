<?php

namespace TruckersMP\APIClient\Requests\Company;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Collections\Company\PostCollection;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
use TruckersMP\APIClient\Models\CompanyPost;
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
     * @param  int  $companyId
     * @return void
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
     * @return PostCollection|CompanyPost[]
     *
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function get(): PostCollection
    {
        return new PostCollection(
            $this->send()['response']
        );
    }
}
