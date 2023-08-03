<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use TruckersMP\APIClient\Client;

class CompanyRole extends Model
{
    /**
     * The ID of the requested role.
     *
     * @var int
     */
    protected int $id;

    /**
     * The name of the role.
     *
     * @var string
     */
    protected string $name;

    /**
     * The order in which the role is displayed.
     *
     * @var int
     */
    protected ?int $order;

    /**
     * The owner of the company.
     *
     * @var bool
     */
    protected bool $owner;

    /**
     * The date at which the role was created.
     *
     * @var Carbon
     */
    protected Carbon $createdAt;

    /**
     * The date at which the role was last updated.
     *
     * @var Carbon
     */
    protected Carbon $updatedAt;

    /**
     * Create a new CompanyRole instance.
     *
     * @param  Client  $client
     * @param  array  $role
     * @return void
     */
    public function __construct(Client $client, array $role)
    {
        parent::__construct($client, $role);

        $this->id = $this->getValue('id');
        $this->name = $this->getValue('name');
        $this->order = $this->getValue('order');
        $this->owner = $this->getValue('owner', false);
        $this->createdAt = new Carbon($this->getValue('created_at'), 'UTC');
        $this->updatedAt = new Carbon($this->getValue('updated_at'), 'UTC');
    }

    /**
     * Get the ID of the role.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the name of the role.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the order ID for the role. The lower the order ID, the higher it shows in the list.
     *
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * Check if the role is the role of the company owner.
     *
     * @return bool
     */
    public function isOwner(): bool
    {
        return $this->owner;
    }

    /**
     * Get the date which the role was created.
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * Get the date which the role was last updated.
     *
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }
}
