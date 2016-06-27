<?php
/**
 * Created by PhpStorm.
 * User: thor
 * Date: 27.06.16
 * Time: 09:46
 */

namespace TruckersMP\Types;

use Carbon\Carbon;
use Psr\Http\Message\ResponseInterface;

class Version
{
    public $version;

    public $checksum;

    public $released;

    public $support;

    public function __construct(ResponseInterface $response)
    {
        $json = json_decode((string)$response->getBody(), true, 512, JSON_BIGINT_AS_STRING);


        $this->version = new \stdClass();
        $this->version->human = $json['name'];
        $this->version->stage = $json['stage'];
        $this->version->nummeric = $json['numeric'];

        $this->checksum = new \stdClass();
        $this->checksum->atsmp = new \stdClass();
        $this->checksum->atsmp->dll = $json['atsmp_checksum']['dll'];
        $this->checksum->atsmp->adb = $json['atsmp_checksum']['adb'];
        $this->checksum->ets2mp = new \stdClass();
        $this->checksum->ets2mp->dll = $json['atsmp_checksum']['dll'];
        $this->checksum->ets2mp->adb = $json['atsmp_checksum']['adb'];

        $this->released = new Carbon($json['time'], 'UTC');

        $this->support = new \stdClass();
        $this->support->ets2 = $json['supported_game_version'];
        $this->support->ats = $json['supported_ats_game_version'];

    }
}
