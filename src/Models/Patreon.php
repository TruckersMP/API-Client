<?php

namespace TruckersMP\APIClient\Models;

class Patreon
{
    /**
     * If the current player is a patron.
     *
     * @var bool
     */
    protected $isPatron;

    /**
     * If the player's patron subscription is active.
     *
     * @var bool
     */
    protected $active;

    /**
     * The HEX code for subscribed tier.
     *
     * @var string|null
     */
    protected $color;

    /**
     * The player's tier ID.
     *
     * @var int|null
     */
    protected $tierId;

    /**
     * The player's current pledge.
     *
     * @var int|null
     */
    protected $currentPledge;

    /**
     * The player's lifetime pledge.
     *
     * @var int|null
     */
    protected $lifetimePledge;

    /**
     * The player's next pledge.
     *
     * @var int|null
     */
    protected $nextPledge;

    /**
     * If the user has their patreon information hidden.
     *
     * @var bool
     */
    protected $hidden;

    /**
     * Create a new Patreon instance.
     *
     * @param  bool  $isPatron
     * @param  bool  $active
     * @param  string|null  $color
     * @param  int|null  $tierId
     * @param  int|null  $currentPledge
     * @param  int|null  $lifetimePledge
     * @param  int|null  $nextPledge
     * @param  bool|null  $hidden
     */
    public function __construct(
        bool $isPatron,
        bool $active,
        ?string $color,
        ?int $tierId,
        ?int $currentPledge,
        ?int $lifetimePledge,
        ?int $nextPledge,
        ?bool $hidden
    ) {
        $this->isPatron = $isPatron;
        $this->active = $active;
        $this->color = $color;
        $this->tierId = $tierId;
        $this->currentPledge = $currentPledge;
        $this->lifetimePledge = $lifetimePledge;
        $this->nextPledge = $nextPledge;
        $this->hidden = $hidden;
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
