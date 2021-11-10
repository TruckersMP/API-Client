<?php

namespace TruckersMP\APIClient\Requests\Company;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\CompanyPost;
use TruckersMP\APIClient\Requests\Request;

class PostRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var string|int
     */
    protected $companyId;

    /**
     * The ID of the requested post.
     *
     * @var int
     */
    protected $postId;

    /**
     * Create a new PostRequest instance.
     *
     * @param  string|int  $companyId
     * @param  int  $postId
     * @return void
     */
    public function __construct(string $companyId, int $postId)
    {
        parent::__construct();

        $this->companyId = $companyId;
        $this->postId = $postId;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyId . '/news/' . $this->postId;
    }

    /**
     * Get the data for the request.
     *
     * @return CompanyPost
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): CompanyPost
    {
        return new CompanyPost(
            $this->send()['response']
        );
    }
}
