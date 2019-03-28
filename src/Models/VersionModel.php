<?php

namespace TruckersMP\Models;

use Carbon\Carbon;

class VersionModel
{
    /**
     * @var \stdClass
     */
    public $version;

    /**
     * @var \stdClass
     */
    public $checksum;

    /**
     * @var Carbon
     */
    public $released;

    /**
     * @var \stdClass
     */
    public $support;

    /**
     * VersionModel constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->version = new \stdClass();
        $this->version->human = $response['name'];
        $this->version->stage = $response['stage'];
        $this->version->nummeric = $response['numeric'];

        $this->checksum = new \stdClass();
        $this->checksum->atsmp = new \stdClass();
        $this->checksum->atsmp->dll = $response['atsmp_checksum']['dll'];
        $this->checksum->atsmp->adb = $response['atsmp_checksum']['adb'];
        $this->checksum->ets2mp = new \stdClass();
        $this->checksum->ets2mp->dll = $response['atsmp_checksum']['dll'];
        $this->checksum->ets2mp->adb = $response['atsmp_checksum']['adb'];

        $this->released = new Carbon($response['time'], 'UTC');

        $this->support = new \stdClass();
        $this->support->ets2 = $response['supported_game_version'];
        $this->support->ats = $response['supported_ats_game_version'];
    }
}