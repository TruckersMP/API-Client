<?php

namespace Tests\Unit;

use Tests\TestCase;
use TruckersMP\Collections\PostsCollection;
use TruckersMP\Models\CompanyPost;

class CompanyPostTest extends TestCase
{
    /**
     * The ID of the company to use in the tests.
     */
    private const TEST_COMPANY = 17;

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testWeCanGetAllTheNewsPosts()
    {
        $posts = $this->companyNews(self::TEST_COMPANY);

        $this->assertInstanceOf(PostsCollection::class, $posts);

        if ($posts->count() > 0) {
            $post = $posts[0];

            $this->assertInstanceOf(CompanyPost::class, $post);
        }
    }
}
