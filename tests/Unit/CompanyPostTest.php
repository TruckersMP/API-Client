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
     * The ID of the post to use in the tests.
     */
    private const TEST_POST = 121;

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testWeCanGetAllTheNewsPosts()
    {
        $posts = $this->companyPosts(self::TEST_COMPANY);

        $this->assertInstanceOf(PostsCollection::class, $posts);

        if ($posts->count() > 0) {
            $post = $posts[0];

            $this->assertInstanceOf(CompanyPost::class, $post);
        }
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testWeCanGetAPost()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertInstanceOf(CompanyPost::class, $post);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasAnId()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsInt($post->getId());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasATitle()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsString($post->getTitle());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasASummary()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsString($post->getSummary());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasCotent()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsString($post->getContent());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasAnAuthorId()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsInt($post->getAuthorId());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasAnAuthor()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsString($post->getAuthor());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testIfThePostIsPinned()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsBool($post->isPinned());
    }
}
