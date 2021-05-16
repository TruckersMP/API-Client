<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;

class CompanyRole
{
    /**
     * The ID of the requested role.
     *
     * @var int
     */
    protected $id;

    /**
     * The name of the role.
     *
     * @var string
     */
    protected $name;

    /**
     * The order in which the role is displayed.
     *
     * @var int
     */
    protected $order;

    /**
     * The owner of the company.
     *
     * @var bool
     */
    protected $owner;

    /**
     * The date at which the role was created.
     *
     * @var Carbon
     */
    protected $createdAt;

    /**
     * The date at which the role was last updated.
     *
     * @var Carbon
     */
    protected $updatedAt;

    /**
     * Create a new CompanyRole instance.
     *
     * @param  array  $role
     * @return void
     */
    public function __construct(array $role)
    {
        $this->id = $role['id'];
        $this->name = $role['name'];
        $this->order = $role['order'];
        $this->owner = $role['owner'];
        $this->createdAt = new Carbon($role['created_at'], 'UTC');
        $this->updatedAt = new Carbon($role['updated_at'], 'UTC');
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
