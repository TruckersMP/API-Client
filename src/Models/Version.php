<?php

namespace TruckersMP\Models;

use Carbon\Carbon;

class Version
{
    /**
     * Name of the current version.
     *
     * @var string
     */
    protected $name;

    /**
     * The numeric name of the current version.
     *
     * @var string
     */
    protected $numeric;

    /**
     * The current stage in the development process.
     *
     * @var string
     */
    protected $stage;

    /**
     * The ETS2MP checksum.
     *
     * @var \TruckersMP\Models\Checksum
     */
    protected $ets2mpChecksum;

    /**
     * The ATSMP checksum.
     *
     * @var \TruckersMP\Models\Checksum
     */
    protected $atsmpChecksum;

    /**
     * The time that the version was released.
     *
     * @var \Carbon\Carbon
     */
    protected $time;

    /**
     * The ETS2 version that is supported.
     *
     * @var string
     */
    protected $supportedGameVersion;

    /**
     * The ATS version that is supported.
     *
     * @var string
     */
    protected $supportedATSGameVersion;

    /**
     * Create a new Version instance.
     *
     * @param array $version
     *
     * @throws \Exception
     */
    public function __construct(array $version)
    {
        $this->name = $version['name'];
        $this->numeric = $version['numeric'];
        $this->stage = $version['stage'];

        $this->ets2mpChecksum = new Checksum(
            $version['ets2mp_checksum']
        );

        $this->atsmpChecksum = new Checksum(
            $version['atsmp_checksum']
        );

        $this->time = new Carbon($version['time'], 'UTC');
        $this->supportedGameVersion = $version['supported_game_version'];
        $this->supportedATSGameVersion = $version['supported_ats_game_version'];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNumeric(): string
    {
        return $this->numeric;
    }

    /**
     * @return string
     */
    public function getStage(): string
    {
        return $this->stage;
    }

    /**
     * @return \TruckersMP\Models\Checksum
     */
    public function getETS2MPChecksum()
    {
        return $this->ets2mpChecksum;
    }

    /**
     * @return \TruckersMP\Models\Checksum
     */
    public function getATSMPChecksum()
    {
        return $this->atsmpChecksum;
    }

    /**
     * @return \Carbon\Carbon
     */
    public function getTime(): Carbon
    {
        return $this->time;
    }

    /**
     * @return string
     */
    public function getSupportedGameVersion(): string
    {
        return $this->supportedGameVersion;
    }

    /**
     * @return string
     */
    public function getSupportedATSGameVersion(): string
    {
        return $this->supportedATSGameVersion;
    }
}
