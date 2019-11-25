<?php

namespace TruckersMP\Models;

class Checksum
{
    /**
     * The checksum DLL.
     *
     * @var string
     */
    protected $dll;

    /**
     * The checksum ADB.
     *
     * @var string
     */
    protected $adb;

    /**
     * Create a new Checksum instance.
     *
     * @param  array  $checksum
     */
    public function __construct(array $checksum)
    {
        $this->dll = $checksum['dll'];
        $this->adb = $checksum['adb'];
    }

    /**
     * @return string
     */
    public function getDLL(): string
    {
        return $this->dll;
    }

    /**
     * @return string
     */
    public function getADB(): string
    {
        return $this->adb;
    }
}
