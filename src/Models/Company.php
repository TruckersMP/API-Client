<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;

class Company
{
    /**
     * The value used if recruitment is closed.
     */
    protected const RECRUITMENT_CLOSED = 'Close';

    /**
     * The ID of the company requested.
     *
     * @var int
     */
    protected $id;

    /**
     * The name of the company.
     *
     * @var string
     */
    protected $name;

    /**
     * Get the owners ID.
     *
     * @var int
     */
    protected $ownerId;

    /**
     * Get the owners name.
     *
     * @var string
     */
    protected $ownerName;

    /**
     * Get the slogan of the company.
     *
     * @var string
     */
    protected $slogan;

    /**
     * Get the tag of the company.
     *
     * @var string
     */
    protected $tag;

    /**
     * Get the companies logo image URL.
     *
     * @var string
     */
    protected $logo;

    /**
     * Get the companies cover image URL.
     *
     * @var string
     */
    protected $cover;

    /**
     * Get the company information.
     *
     * @var string
     */
    protected $information;

    /**
     * Get the company rules.
     *
     * @var string
     */
    protected $rules;

    /**
     * Get the company requirements.
     *
     * @var string
     */
    protected $requirements;

    /**
     * Get the companies website.
     *
     * @var string|null
     */
    protected $website;

    /**
     * Get the companies social information.
     *
     * @var Social
     */
    protected $social;

    /**
     * Get the games the company supports.
     *
     * @var Game
     */
    protected $games;

    /**
     * The number of members in the company.
     *
     * @var int
     */
    protected $membersCount;

    /**
     * The recruitment status of the company.
     *
     * @var string
     */
    protected $recruitment;

    /**
     * The language of the company.
     *
     * @var string
     */
    protected $language;

    /**
     * If the company is verified.
     *
     * @var bool
     */
    protected $verified;

    /**
     * If the company is validated.
     *
     * @var bool
     */
    protected $validated;

    /**
     * The date and time the company was created.
     *
     * @var Carbon
     */
    protected $createdAt;

    /**
     * Create a new Company instance.
     *
     * @param  array  $company
     * @return void
     */
    public function __construct(array $company)
    {
        $this->id = $company['id'];
        $this->name = $company['name'];
        $this->ownerId = $company['owner_id'];
        $this->ownerName = $company['owner_username'];
        $this->slogan = $company['slogan'];
        $this->tag = $company['tag'];

        if (array_key_exists('logo', $company)) {
            $this->logo = $company['logo'];
        }

        if (array_key_exists('cover', $company)) {
            $this->cover = $company['cover'];
        }

        if (array_key_exists('information', $company)) {
            $this->information = $company['information'];
        }

        if (array_key_exists('rules', $company)) {
            $this->rules = $company['rules'];
        }

        if (array_key_exists('requirements', $company)) {
            $this->requirements = $company['requirements'];
        }

        $this->website = $company['website'];

        $this->social = new Social(
            $company['socials']['twitter'],
            $company['socials']['facebook'],
            $company['socials']['twitch'],
            $company['socials']['discord'],
            $company['socials']['youtube']
        );

        $this->games = new Game(
            $company['games']['ats'],
            $company['games']['ets']
        );

        $this->membersCount = intval($company['members_count']);
        $this->recruitment = $company['recruitment'];
        $this->language = $company['language'];
        $this->verified = boolval($company['verified']);
        $this->validated = boolval($company['validated']);
        $this->createdAt = new Carbon($company['created'], 'UTC');
    }

    /**
     * Get the ID of the company.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the name of the company.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the ID of the player who owns the company.
     *
     * @return int
     */
    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    /**
     * Get the name of the player who owns the company.
     *
     * @return string
     */
    public function getOwnerName(): string
    {
        return $this->ownerName;
    }

    /**
     * Get the company slogan.
     *
     * @return string
     */
    public function getSlogan(): string
    {
        return $this->slogan;
    }

    /**
     * Get the company tag.
     *
     * @return string
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * Get the URL to the companies logo.
     *
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * Get the URL to the companies cover image.
     *
     * @return string
     */
    public function getCover(): string
    {
        return $this->cover;
    }

    /**
     * Get the information about the company.
     *
     * @return string
     */
    public function getInformation(): string
    {
        return $this->information;
    }

    /**
     * Get the companies rules.
     *
     * @return string
     */
    public function getRules(): string
    {
        return $this->rules;
    }

    /**
     * Get the companies requirements.
     *
     * @return string
     */
    public function getRequirements(): string
    {
        return $this->requirements;
    }

    /**
     * Get the companies website URL.
     *
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * Get the companies social information.
     *
     * @return Social
     */
    public function getSocial(): Social
    {
        return $this->social;
    }

    /**
     * Get the games which the company supports.
     *
     * @return Game
     */
    public function getGames(): Game
    {
        return $this->games;
    }

    /**
     * Get the number of members that are part of the company.
     *
     * @return int
     */
    public function getMembersCount(): int
    {
        return $this->membersCount;
    }

    /**
     * Get the companies recruitment status i.e. Open or Closed.
     *
     * @return string
     */
    public function getRecruitment(): string
    {
        return $this->recruitment;
    }

    /**
     * Get the companies primary language.
     *
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * Check if the company is verified or not.
     *
     * @return bool
     */
    public function isVerified(): bool
    {
        return $this->verified;
    }

    /**
     * Check if the company is validated or not.
     *
     * @return bool
     */
    public function isValidated(): bool
    {
        return $this->validated;
    }

    /**
     * Get the date which the company was created.
     *
     * @return Carbon
     */
    public function getCreatedDate(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * Determine if recruitment is closed for the company.
     *
     * @return bool
     */
    public function isRecruitmentClosed(): bool
    {
        return $this->recruitment === self::RECRUITMENT_CLOSED;
    }

    /**
     * Determine if recruitment is open for the company.
     *
     * @return bool
     */
    public function isRecruitmentOpen(): bool
    {
        return !$this->isRecruitmentClosed();
    }
}
