<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use TruckersMP\APIClient\Client;

class PlayerAward extends Model
{
    /**
     * The ID of the award.
     *
     * @var int
     */
    protected int $id;

    /**
     * The name of the award.
     *
     * @var string
     */
    protected string $name;

    /**
     * The link to the award image.
     *
     * @var string
     */
    protected string $imageUrl;

    /**
     * The date and time the user was given the award (UTC).
     *
     * @var Carbon
     */
    protected Carbon $awardedAt;

    /**
     * Create a new PlayerAward instance.
     *
     * @param  Client  $client
     * @param  array  $award
     * @return void
     */
    public function __construct(Client $client, array $award)
    {
        parent::__construct($client, $award);

        $this->id = $this->getValue('id');
        $this->name = $this->getValue('name');
        $this->imageUrl = $this->getValue('image_url');
        $this->awardedAt = new Carbon($this->getValue('awarded_at'), 'UTC');
    }

    /**
     * Get the ID of the award.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the name of the award.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the link to the award image.
     *
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * Get the date and time the user was given the award (UTC).
     *
     * @return Carbon
     */
    public function getAwardedAt(): Carbon
    {
        return $this->awardedAt;
    }
}
