<?php

namespace Tests\Unit;

use Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException;
use Psr\Http\Client\ClientExceptionInterface;
use Tests\TestCase;
use TruckersMP\APIClient\Collections\Company\PostCollection;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
use TruckersMP\APIClient\Models\CompanyPost;

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
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetAllTheNewsPosts()
    {
        $posts = $this->companyPosts(self::TEST_COMPANY);

        $this->assertInstanceOf(PostCollection::class, $posts);

        if ($posts->count() > 0) {
            $post = $posts[0];

            $this->assertInstanceOf(CompanyPost::class, $post);
        }
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetAPost()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertInstanceOf(CompanyPost::class, $post);
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnId()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsInt($post->getId());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasATitle()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsString($post->getTitle());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasASummary()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsString($post->getSummary());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasContent()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsString($post->getContent());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnAuthorId()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsInt($post->getAuthorId());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnAuthor()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsString($post->getAuthor());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testIfThePostIsPinned()
    {
        $post = $this->companyPost(self::TEST_COMPANY, self::TEST_POST);

        $this->assertIsBool($post->isPinned());
    }
}
