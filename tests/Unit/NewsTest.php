<?php

namespace Tests\Unit;

use Tests\TestCase;
use TruckersMP\Collections\NewsCollection;

class NewsTest extends TestCase
{
    /**
     * The ID of the company to use in the tests.
     */
    private const TEST_COMPANY = 1;

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testWeCanGetAllTheNewsPosts()
    {
        $posts = $this->companyNews(self::TEST_COMPANY);

        $this->assertInstanceOf(NewsCollection::class, $posts);

        if ($posts->count() > 0) {
            $post = $posts[0];

            $this->assertInstanceOf(CompanyPost::class, $post);
        }
    }
}
