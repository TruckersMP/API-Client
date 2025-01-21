<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use TruckersMP\APIClient\Client;

class PlayerAchievement extends Model
{
    /**
     * The ID of the achievement.
     *
     * @var int
     */
    protected int $id;

    /**
     * The title of the achievement.
     *
     * @var string
     */
    protected string $title;

    /**
     * The description of the achievement.
     *
     * @var string
     */
    protected string $description;

    /**
     * The link to the achievement image.
     *
     * @var string
     */
    protected string $imageUrl;

    /**
     * The date and time the user was given the achievement (UTC).
     *
     * @var Carbon
     */
    protected Carbon $achievedAt;

    /**
     * Create a new PlayerAchievement instance.
     *
     * @param  Client  $client
     * @param  array  $achievement
     * @return void
     */
    public function __construct(Client $client, array $achievement)
    {
        parent::__construct($client, $achievement);

        $this->id = $this->getValue('id');
        $this->title = $this->getValue('title');
        $this->description = $this->getValue('description');
        $this->imageUrl = $this->getValue('image_url');
        $this->achievedAt = new Carbon($this->getValue('achieved_at'), 'UTC');
    }

    /**
     * Get the ID of the achievement.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the title of the achievement.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Get the description of the achievement.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Get the link to the achievement image.
     *
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * Get the date and time the user was given the achievement (UTC).
     *
     * @return Carbon
     */
    public function getAchievedAt(): Carbon
    {
        return $this->achievedAt;
    }
}
