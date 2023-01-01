<?php

namespace Tests\Unit\Requests;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\CompanyPost;

class CompanyPostRequestTest extends TestCase
{
    use MockAPIRequests;

    public function testItCanGetAllCompanyPosts()
    {
        $this->mockRequest('company.post.index.json', 'vtc/4/news');

        $posts = $this->client->company(4)->posts()->get();

        $this->assertInstanceOf(Collection::class, $posts);
        $this->assertCount(1, $posts);

        $this->assertInstanceOf(CompanyPost::class, $posts->first());
    }

    public function testItCanGetASpecificCompanyPost()
    {
        $this->mockRequest('company.post.json', 'vtc/4/news/365');

        $post = $this->client->company(4)->post(365)->get();

        $this->assertInstanceOf(CompanyPost::class, $post);
    }
}
