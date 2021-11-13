<?php

namespace TruckersMP\APIClient\Requests\Company;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\CompanyPost;
use TruckersMP\APIClient\Requests\Request;

class PostRequest extends Request
{
    /**
     * The ID or slug of the requested company.
     *
     * @var string|int
     */
    protected $companyKey;

    /**
     * The ID of the requested post.
     *
     * @var int
     */
    protected $postId;

    /**
     * Create a new PostRequest instance.
     *
     * @param  string|int  $companyKey
     * @param  int  $postId
     * @return void
     */
    public function __construct(string $companyKey, int $postId)
    {
        parent::__construct();

        $this->companyKey = $companyKey;
        $this->postId = $postId;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyKey . '/news/' . $this->postId;
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
