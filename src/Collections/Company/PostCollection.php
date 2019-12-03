<?php

namespace TruckersMP\APIClient\Collections\Company;

use TruckersMP\APIClient\Collections\Collection;
use TruckersMP\APIClient\Models\CompanyPost;

class PostCollection extends Collection
{
    /**
     * Create a new PostsCollection instance.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        parent::__construct();

        foreach ($response['news'] as $key => $post) {
            $this->items[$key] = new CompanyPost($post);
        }
    }
}
