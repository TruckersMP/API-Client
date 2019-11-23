<?php

namespace TruckersMP\Requests\Companies;

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
     * The DID of the requested post.
     *
     * @var int
     */
    protected $postId;

    /**
     * Create a new PostRequest instance.
     *
     * @param array $config
     * @param int $companyId
     * @param $postId
     */
    public function __construct(array $config, int $companyId, $postId)
    {
        parent::__construct($config);

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
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function get(): CompanyPost
    {
        return new CompanyPost(
            $this->call()
        );
    }
}
