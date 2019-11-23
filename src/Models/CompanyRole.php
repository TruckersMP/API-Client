<?php

namespace TruckersMP\Models;

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
     * The owner of the role.
     *
     * @var bool
     */
    protected $owner;

    /**
     * The date at which the role was created.
     *
     * @var \Carbon\Carbon
     */
    protected $createdAt;

    /**
     * The date at which the role was last updated.
     *
     * @var \Carbon\Carbon
     */
    protected $updatedAt;

    /**
     * Create a new CompanyRole instance.
     *
     * @param array $role
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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @return bool
     */
    public function isOwner(): bool
    {
        return $this->owner;
    }

    /**
     * @return \Carbon\Carbon
     */
    public function getCreatedAt(): \Carbon\Carbon
    {
        return $this->createdAt;
    }

    /**
     * @return \Carbon\Carbon
     */
    public function getUpdatedAt(): \Carbon\Carbon
    {
        return $this->updatedAt;
    }
}
