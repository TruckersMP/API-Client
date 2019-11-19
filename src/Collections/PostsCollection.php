<?php

namespace TruckersMP\Collections;

use TruckersMP\Models\CompanyPost;

class PostsCollection extends Collection
{
    /**
     * Create a new NewsCollection instance.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        parent::__construct();

        // TODO: handle any errors or exceptions

        foreach ($response['response']['news'] as $key => $post) {
            $this->items[$key] = new CompanyPost($post);
        }
    }
}
