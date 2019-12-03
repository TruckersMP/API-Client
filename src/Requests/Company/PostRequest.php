<?php

namespace TruckersMP\Requests\Company;

use TruckersMP\Models\CompanyPost;
use TruckersMP\Requests\Request;

class PostRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var int
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
     * @param int $companyId
     * @param int $postId
     */
    public function __construct(int $companyId, int $postId)
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
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function get(): CompanyPost
    {
        return new CompanyPost(
            $this->send()['response']
        );
    }
}
