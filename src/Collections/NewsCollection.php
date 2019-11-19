<?php

namespace TruckersMP\Collections;

use TruckersMP\Models\Post;

class NewsCollection extends Collection
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
            $this->items[$key] = new Post($post);
        }
    }
}
