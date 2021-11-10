<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;

class CompanyPost
{
    /**
     * The ID of the post.
     *
     * @var int
     */
    protected $id;

    /**
     * The post title.
     *
     * @var string
     */
    protected $title;

    /**
     * A summery of the post content.
     *
     * @var string
     */
    protected $summary;

    /**
     * The content of the post.
     *
     * @var string
     */
    protected $content;

    /**
     * The ID of the author who wrote the post.
     *
     * @var int
     */
    protected $authorId;

    /**
     * The author who wrote the post.
     *
     * @var string
     */
    protected $author;

    /**
     * If the post is pinned.
     *
     * @var bool
     */
    protected $pinned;

    /**
     * The date at which the post was last updated at.
     *
     * @var Carbon
     */
    protected $updatedAt;

    /**
     * The date at which the post was published.
     *
     * @var Carbon
     */
    protected $publishedAt;

    /**
     * Create a new Post instance.
     *
     * @param  array  $post
     * @return void
     */
    public function __construct(array $post)
    {
        $this->id = $post['id'];
        $this->title = $post['title'];
        $this->summary = $post['content_summary'];

        if (isset($post['content'])) {
            $this->content = $post['content'];
        }

        $this->authorId = $post['author_id'];
        $this->author = $post['author'];
        $this->pinned = $post['pinned'];
        $this->updatedAt = new Carbon($post['updated_at'], 'UTC');
        $this->publishedAt = new Carbon($post['published_at'], 'UTC');
    }

    /**
     * Get the ID of the post.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the title of the post.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Get the post summary.
     *
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * Get the post content.
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Get the TMP ID of the author who made the post.
     *
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * Get the name of the author who made the post.
     *
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Check if the post is pinned on the companies page.
     *
     * @return bool
     */
    public function isPinned(): bool
    {
        return $this->pinned;
    }

    /**
     * Get the date which the post was last updated at.
     *
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    /**
     * Get the date which the post was published.
     *
     * @return Carbon
     */
    public function getPublishedAt(): Carbon
    {
        return $this->publishedAt;
    }
}
