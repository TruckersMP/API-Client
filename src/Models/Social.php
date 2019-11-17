<?php

namespace TruckersMP\Models;

class Social
{
    /**
     * @var string|null
     */
    protected $twitter;

    /**
     * @var string|null
     */
    protected $facebook;

    /**
     * @var string|null
     */
    protected $plays;

    /**
     * @var string|null
     */
    protected $discord;

    /**
     * @var string|null
     */
    protected $youtube;

    /**
     * Create a new Social instance.
     *
     * @param  string|null  $twitter
     * @param  string|null  $facebook
     * @param  string|null  $plays
     * @param  string|null  $discord
     * @param  string|null  $youtube
     */
    public function __construct(
        string $twitter = null,
        string $facebook = null,
        string $plays = null,
        string $discord = null,
        string $youtube = null
    ) {

        $this->twitter = $twitter;
        $this->facebook = $facebook;
        $this->plays = $plays;
        $this->discord = $discord;
        $this->youtube = $youtube;
    }

    /**
     * @return string|null
     */
    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    /**
     * @return string|null
     */
    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    /**
     * @return string|null
     */
    public function getPlays(): ?string
    {
        return $this->plays;
    }

    /**
     * @return string|null
     */
    public function getDiscord(): ?string
    {
        return $this->discord;
    }

    /**
     * @return string|null
     */
    public function getYoutube(): ?string
    {
        return $this->youtube;
    }
}
