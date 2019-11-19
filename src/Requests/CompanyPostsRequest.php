<?php

namespace TruckersMP\Requests;

use TruckersMP\Collections\PostsCollection;

class CompanyPostsRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var int
     */
    protected $id;

    /**
     * Create a new NewsRequest instance.
     *
     * @param array $config
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
        return 'vtc/' . $this->id . '/news';
    }

    /**
     * Get the data for the request.
     *
     * @return mixed
     * @throws \Http\Client\Exception
     */
    public function get()
    {
        return new PostsCollection(
            $this->call()
        );
    }
}
