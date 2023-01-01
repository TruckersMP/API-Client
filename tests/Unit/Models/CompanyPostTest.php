<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\CompanyPost;

class CompanyPostTest extends TestCase
{
    use MockModelData;

    /**
     * A CompanyPost model instance with mocked data.
     *
     * @var CompanyPost
     */
    private CompanyPost $post;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('company.post.json');

        $this->post = new CompanyPost($this->client, $data);
    }

    public function testItHasAnId()
    {
        $this->assertSame(365, $this->post->getId());
    }

    public function testItHasATitle()
    {
        $this->assertSame('Title', $this->post->getTitle());
    }

    public function testItHasASummary()
    {
        $this->assertSame('Summary', $this->post->getSummary());
    }

    public function testItHasAContent()
    {
        $this->assertSame('Content', $this->post->getContent());
    }

    public function testItHasAnAuthor()
    {
        $this->assertSame(46, $this->post->getAuthorId());
        $this->assertSame('Author', $this->post->getAuthor());
    }

    public function testItIsNotPinned()
    {
        $this->assertFalse($this->post->isPinned());
    }

    public function testItHasAnUpdateDate()
    {
        $this->assertDate('2023-01-04 15:21:34', $this->post->getUpdatedAt());
    }

    public function testItHasAPublishDate()
    {
        $this->assertDate('2023-01-04 15:23:13', $this->post->getPublishedAt());
    }
}
