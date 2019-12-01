<?php

namespace TruckersMP\Collections;

use TruckersMP\Models\CompanyPost;

class PostsCollection extends Collection
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
