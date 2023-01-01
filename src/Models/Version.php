<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use TruckersMP\APIClient\Client;

class Version extends Model
{
    /**
     * Name of the current version.
     *
     * @var string
     */
    protected string $name;

    /**
     * The numeric name of the current version.
     *
     * @var string
     */
    protected string $numeric;

    /**
     * The current stage in the development process.
     *
     * @var string
     */
    protected string $stage;

    /**
     * The ETS2MP checksum.
     *
     * @var Checksum
     */
    protected Checksum $ets2mpChecksum;

    /**
     * The ATSMP checksum.
     *
     * @var Checksum
     */
    protected Checksum $atsmpChecksum;

    /**
     * The time that the version was released.
     *
     * @var Carbon
     */
    protected Carbon $time;

    /**
     * The ETS2 version that is supported.
     *
     * @var string
     */
    protected string $supportedETS2GameVersion;

    /**
     * The ATS version that is supported.
     *
     * @var string
     */
    protected string $supportedATSGameVersion;

    /**
     * Create a new Version instance.
     *
     * @param  Client  $client
     * @param  array  $version
     * @return void
     */
    public function __construct(Client $client, array $version)
    {
        parent::__construct($client, $version);

        $this->name = $this->getValue('name');
        $this->numeric = $this->getValue('numeric');
        $this->stage = $this->getValue('stage');

        $this->ets2mpChecksum = new Checksum(
            $this->getValue('ets2mp_checksum.dll'),
            $this->getValue('ets2mp_checksum.adb'),
        );

        $this->atsmpChecksum = new Checksum(
            $this->getValue('atsmp_checksum.dll'),
            $this->getValue('atsmp_checksum.adb'),
        );

        $this->time = new Carbon($this->getValue('time'), 'UTC');
        $this->supportedETS2GameVersion = $this->getValue('supported_game_version');
        $this->supportedATSGameVersion = $this->getValue('supported_ats_game_version');
    }

    /**
     * Get the version name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the numeric name of the version.
     *
     * @return string
     */
    public function getNumeric(): string
    {
        return $this->numeric;
    }

    /**
     * Get the stage of which the version is at within the development lifecycle.
     *
     * @return string
     */
    public function getStage(): string
    {
        return $this->stage;
    }

    /**
     * Get the ETS2MP checksum for the current version.
     *
     * @return Checksum
     */
    public function getETS2MPChecksum(): Checksum
    {
        return $this->ets2mpChecksum;
    }

    /**
     * Get the ATSMP checksum for the current version.
     *
     *
     * @return Checksum
     */
    public function getATSMPChecksum(): Checksum
    {
        return $this->atsmpChecksum;
    }

    /**
     * Get the date which the version was released.
     *
     * @return Carbon
     */
    public function getTime(): Carbon
    {
        return $this->time;
    }

    /**
     * Get the supported Euro Truck Simulator 2 version.
     *
     * @return string
     */
    public function getSupportedETS2GameVersion(): string
    {
        return $this->supportedETS2GameVersion;
    }

    /**
     * Get the supported American Truck Simulator version.
     *
     * @return string
     */
    public function getSupportedATSGameVersion(): string
    {
        return $this->supportedATSGameVersion;
    }
}
