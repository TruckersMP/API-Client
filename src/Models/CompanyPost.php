<?php

namespace TruckersMP\APIClient\Models;

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
     * Create a new Post instance.
     *
     * @param array $post
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
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return bool
     */
    public function isPinned(): bool
    {
        return $this->pinned;
    }
}
