<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use TruckersMP\APIClient\Client;

class CompanyPartnership extends Model
{
    /**
     * The ID of the company partnership.
     *
     * @var int
     */
    protected int $id;

    /**
     * The status of the company partnership.
     *
     * @var string
     */
    protected string $status;

    /**
     * The date and time the partnership was first requested at by the sender.
     *
     * @var Carbon
     */
    protected Carbon $createdAt;

    /**
     * The date and time the partnership was last updated at.
     *
     * @var Carbon
     */
    protected Carbon $updatedAt;

    /**
     * The company that sent the partnership request.
     *
     * @var Company
     */
    protected Company $sender;

    /**
     * The company that received the partnership request.
     *
     * @var Company
     */
    protected Company $receiver;

    /**
     * Create a new CompanyPartnership instance.
     *
     * @param  Client  $client
     * @param  array  $partnership
     * @return void
     */
    public function __construct(Client $client, array $partnership)
    {
        parent::__construct($client, $partnership);

        $this->id = $this->getValue('id');
        $this->status = $this->getValue('status');
        $this->createdAt = new Carbon($this->getValue('created_at'), 'UTC');
        $this->updatedAt = new Carbon($this->getValue('updated_at'), 'UTC');
        $this->sender = new Company($client, $this->getValue('sender'));
        $this->receiver = new Company($client, $this->getValue('receiver'));
    }

    /**
     * Get the ID of the partnership.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the status of the partnership. The API only returns accepted partnerships.
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Get the date which the partnership was first requested at by the sender.
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * Get the date which the partnership was last updated at due to the status changing.
     *
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    /**
     * Get the company that sent the partnership request.
     *
     * @return Company
     */
    public function getSender(): Company
    {
        return $this->sender;
    }

    /**
     * Get the company that received the partnership request.
     *
     * @return Company
     */
    public function getReceiver(): Company
    {
        return $this->receiver;
    }
}
