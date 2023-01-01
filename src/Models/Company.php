<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use TruckersMP\APIClient\Client;

class Company extends Model
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
    protected int $id;

    /**
     * The name of the company.
     *
     * @var string
     */
    protected string $name;

    /**
     * Get the owner's ID.
     *
     * @var int
     */
    protected int $ownerId;

    /**
     * Get the owner's name.
     *
     * @var string
     */
    protected string $ownerName;

    /**
     * Get the slogan of the company.
     *
     * @var string
     */
    protected string $slogan;

    /**
     * Get the tag of the company.
     *
     * @var string
     */
    protected string $tag;

    /**
     * Get the company's logo image URL.
     *
     * @var string|null
     */
    protected ?string $logo;

    /**
     * Get the company's cover image URL.
     *
     * @var string|null
     */
    protected ?string $cover;

    /**
     * Get the company information.
     *
     * @var string|null
     */
    protected ?string $information;

    /**
     * Get the company rules.
     *
     * @var string|null
     */
    protected ?string $rules;

    /**
     * Get the company requirements.
     *
     * @var string|null
     */
    protected ?string $requirements;

    /**
     * Get the company's website.
     *
     * @var string|null
     */
    protected ?string $website;

    /**
     * Get the company's social information.
     *
     * @var Social
     */
    protected Social $social;

    /**
     * Get the games the company supports.
     *
     * @var Game
     */
    protected Game $games;

    /**
     * The number of members in the company.
     *
     * @var int
     */
    protected int $membersCount;

    /**
     * The recruitment status of the company.
     *
     * @var string
     */
    protected string $recruitment;

    /**
     * The language of the company.
     *
     * @var string
     */
    protected string $language;

    /**
     * If the company is verified.
     *
     * @var bool
     */
    protected bool $verified;

    /**
     * If the company is validated.
     *
     * @var bool
     */
    protected bool $validated;

    /**
     * The date and time the company was created.
     *
     * @var Carbon
     */
    protected Carbon $createdAt;

    /**
     * Create a new Company instance.
     *
     * @param  Client  $client
     * @param  array  $company
     * @return void
     */
    public function __construct(Client $client, array $company)
    {
        parent::__construct($client, $company);

        $this->id = $this->getValue('id');
        $this->name = $this->getValue('name');
        $this->ownerId = $this->getValue('owner_id');
        $this->ownerName = $this->getValue('owner_username');
        $this->slogan = $this->getValue('slogan');
        $this->tag = $this->getValue('tag');

        $this->logo = $this->getValue('logo');
        $this->cover = $this->getValue('cover');
        $this->information = $this->getValue('information');
        $this->rules = $this->getValue('rules');
        $this->requirements = $this->getValue('requirements');
        $this->website = $this->getValue('website');

        $this->social = new Social(
            $this->getValue('socials.twitter'),
            $this->getValue('socials.facebook'),
            $this->getValue('socials.twitch'),
            $this->getValue('socials.discord'),
            $this->getValue('socials.youtube'),
        );

        $this->games = new Game(
            $this->getValue('games.ats'),
            $this->getValue('games.ets'),
        );

        $this->membersCount = $this->getValue('members_count');
        $this->recruitment = $this->getValue('recruitment');
        $this->language = $this->getValue('language');
        $this->verified = $this->getValue('verified');
        $this->validated = $this->getValue('validated');
        $this->createdAt = new Carbon($this->getValue('created'), 'UTC');
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
     * Get the URL to the company's logo.
     *
     * @return string|null
     */
    public function getLogo(): ?string
    {
        return $this->logo;
    }

    /**
     * Get the URL to the company's cover image.
     *
     * @return string|null
     */
    public function getCover(): ?string
    {
        return $this->cover;
    }

    /**
     * Get the information about the company.
     *
     * @return string|null
     */
    public function getInformation(): ?string
    {
        return $this->information;
    }

    /**
     * Get the company's rules.
     *
     * @return string|null
     */
    public function getRules(): ?string
    {
        return $this->rules;
    }

    /**
     * Get the company's requirements.
     *
     * @return string|null
     */
    public function getRequirements(): ?string
    {
        return $this->requirements;
    }

    /**
     * Get the company's website URL.
     *
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * Get the company's social information.
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
     * Get the company's recruitment status i.e. Open or Close.
     *
     * @return string
     */
    public function getRecruitment(): string
    {
        return $this->recruitment;
    }

    /**
     * Get the company's primary language.
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
