<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use TruckersMP\APIClient\Client;

class CompanyPost extends Model
{
    /**
     * The ID of the post.
     *
     * @var int
     */
    protected int $id;

    /**
     * The post title.
     *
     * @var string
     */
    protected string $title;

    /**
     * A summary of the post content.
     *
     * @var string
     */
    protected string $summary;

    /**
     * The content of the post.
     *
     * @var string|null
     */
    protected ?string $content;

    /**
     * The ID of the author who wrote the post.
     *
     * @var int
     */
    protected int $authorId;

    /**
     * The author who wrote the post.
     *
     * @var string
     */
    protected string $author;

    /**
     * If the post is pinned.
     *
     * @var bool
     */
    protected bool $pinned;

    /**
     * The date at which the post was last updated at.
     *
     * @var Carbon
     */
    protected Carbon $updatedAt;

    /**
     * The date at which the post was published.
     *
     * @var Carbon
     */
    protected Carbon $publishedAt;

    /**
     * Create a new Post instance.
     *
     * @param  Client  $client
     * @param  array  $post
     * @return void
     */
    public function __construct(Client $client, array $post)
    {
        parent::__construct($client, $post);

        $this->id = $this->getValue('id');
        $this->title = $this->getValue('title');
        $this->summary = $this->getValue('content_summary');
        $this->content = $this->getValue('content');
        $this->authorId = $this->getValue('author_id');
        $this->author = $this->getValue('author');
        $this->pinned = $this->getValue('pinned', false);
        $this->updatedAt = new Carbon($this->getValue('updated_at'), 'UTC');
        $this->publishedAt = new Carbon($this->getValue('published_at'), 'UTC');
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
     * @return string|null
     */
    public function getContent(): ?string
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
     * Check if the post is pinned on the company's page.
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
