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
     * @param array $social
     */
    public function __construct(array $social)
    {
        $this->twitter = $social['twitter'];
        $this->facebook = $social['facebook'];
        $this->plays = $social['playstv'];
        $this->discord = $social['discord'];
        $this->youtube = $social['youtube'];
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
    public function getYouTube(): ?string
    {
        return $this->youtube;
    }
}
