<?php

namespace TruckersMP\APIClient\Models;

use TruckersMP\APIClient\Client;

class Patreon extends Model
{
    /**
     * If the current player is a patron.
     *
     * @var bool
     */
    protected bool $isPatron;

    /**
     * If the player's patron subscription is active.
     *
     * @var bool
     */
    protected bool $active;

    /**
     * The HEX code for subscribed tier.
     *
     * @var string|null
     */
    protected ?string $color;

    /**
     * The player's tier ID.
     *
     * @var int|null
     */
    protected ?int $tierId;

    /**
     * The player's current pledge.
     *
     * @var int|null
     */
    protected ?int $currentPledge;

    /**
     * The player's lifetime pledge.
     *
     * @var int|null
     */
    protected ?int $lifetimePledge;

    /**
     * The player's next pledge.
     *
     * @var int|null
     */
    protected ?int $nextPledge;

    /**
     * If the user has their patreon information hidden.
     *
     * @var bool
     */
    protected ?bool $hidden;

    /**
     * Create a new Patreon instance.
     *
     * @param  Client  $client
     * @param  array  $data
     * @return void
     */
    public function __construct(Client $client, array $data)
    {
        parent::__construct($client, $data);

        $this->isPatron = $this->getValue('isPatron', false);
        $this->active = $this->getValue('active', false);
        $this->color = $this->getValue('color');
        $this->tierId = $this->getValue('tierId');
        $this->currentPledge = $this->getValue('currentPledge');
        $this->lifetimePledge = $this->getValue('lifetimePledge');
        $this->nextPledge = $this->getValue('nextPledge');
        $this->hidden = $this->getValue('hidden');
    }

    /**
     * Get if the current player is a patron.
     *
     * @return bool
     */
    public function isPatron(): bool
    {
        return $this->isPatron;
    }

    /**
     * Get if the player's patron subscription is active.
     *
     * @return mixed
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * Get the HEX code for subscribed tier.
     *
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * Get the player's tier ID.
     *
     * @return int|null
     */
    public function getTierId(): ?int
    {
        return $this->tierId;
    }

    /**
     * Get the player's current pledge.
     *
     * @return int|null
     */
    public function getCurrentPledge(): ?int
    {
        return $this->currentPledge;
    }

    /**
     * Get the player's lifetime pledge.
     *
     * @return int|null
     */
    public function getLifetimePledge(): ?int
    {
        return $this->lifetimePledge;
    }

    /**
     * Get the player's next pledge.
     *
     * @return int|null
     */
    public function getNextPledge(): ?int
    {
        return $this->nextPledge;
    }

    /**
     * Get if the user has their patreon information hidden.
     *
     * @return bool|null
     */
    public function isHidden(): ?bool
    {
        return $this->hidden;
    }
}
