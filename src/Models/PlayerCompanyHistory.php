<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use TruckersMP\APIClient\Client;

class PlayerCompanyHistory extends Model
{
    /**
     * The ID of the company.
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
     * If the company is verified.
     *
     * @var bool
     */
    protected bool $verified;

    /**
     * The date and time the member joined the company (UTC).
     *
     * @var Carbon
     */
    protected Carbon $joinDate;

    /**
     * The date and time the member left the company (UTC).
     *
     * @var Carbon
     */
    protected Carbon $leftDate;

    /**
     * Create a new PlayerCompanyHistory instance.
     *
     * @param  Client  $client
     * @param  array  $history
     * @return void
     */
    public function __construct(Client $client, array $history)
    {
        parent::__construct($client, $history);

        $this->id = $this->getValue('id');
        $this->name = $this->getValue('name');
        $this->verified = $this->getValue('verified', false);
        $this->joinDate = new Carbon($this->getValue('joinDate'), 'UTC');
        $this->leftDate = new Carbon($this->getValue('leftDate'), 'UTC');
    }

    /**
     * Get the company's ID.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the company's name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Check if the company is verified.
     *
     * @return bool
     */
    public function isVerified(): bool
    {
        return $this->verified;
    }

    /**
     * Get the date that the member joined the company.
     *
     * @return Carbon
     */
    public function getJoinDate(): Carbon
    {
        return $this->joinDate;
    }

    /**
     * Get the date that the member left the company.
     *
     * @return Carbon
     */
    public function getLeftDate(): Carbon
    {
        return $this->leftDate;
    }
}
