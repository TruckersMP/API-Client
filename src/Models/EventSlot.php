<?php

namespace TruckersMP\APIClient\Models;

use Illuminate\Support\Collection;
use TruckersMP\APIClient\Client;

class EventSlot extends Model
{
    /**
     * The slot number.
     *
     * @var int
     */
    protected int $number;

    /**
     * The slot name.
     *
     * @var string
     */
    protected string $name;

    /**
     * URL of the slot image.
     *
     * @var string
     */
    protected string $imageUrl;

    /**
     * The total amount of spaces the slot has.
     *
     * @var int
     */
    protected int $totalSpaces;

    /**
     * Whether the slot can be booked by companies.
     *
     * @var bool
     */
    protected bool $available;

    /**
     * Which companies are eligible to book the slot.
     *
     * @var string
     */
    protected string $eligibility;

    /**
     * The companies that requested the slot.
     *
     * @var Collection
     */
    protected Collection $requesters;

    /**
     * Create a new EventSlot instance.
     *
     * @param  Client  $client
     * @param  array  $slot
     * @return void
     */
    public function __construct(Client $client, array $slot)
    {
        parent::__construct($client, $slot);

        $this->number = $this->getValue('number');
        $this->name = $this->getValue('name');
        $this->imageUrl = $this->getValue('image_url');
        $this->totalSpaces = $this->getValue('total_spaces');
        $this->available = $this->getValue('available', false);
        $this->eligibility = $this->getValue('eligibility');

        $requesters = new Collection($this->getValue('requesters', []));
        $this->requesters = $requesters->map(fn (array $requester) => new EventSlotRequester($client, $requester));
    }

    /**
     * Get the slot number.
     *
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * Get the slot name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the URL of the slot image.
     *
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * Get the total amount of spaces the slot has.
     *
     * @return int
     */
    public function getTotalSpaces(): int
    {
        return $this->totalSpaces;
    }

    /**
     * Check if the slot can be booked by companies.
     *
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->available;
    }

    /**
     * Get which companies are eligible to book the slot.
     *
     * The value is one of `all`, `partners`, `verified`, or `validated_and_verified`.
     *
     * @return string
     */
    public function getEligibility(): string
    {
        return $this->eligibility;
    }

    /**
     * Get the companies that requested the slot.
     *
     * @return Collection
     */
    public function getRequesters(): Collection
    {
        return $this->requesters;
    }
}
