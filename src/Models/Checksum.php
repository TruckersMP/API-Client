<?php

namespace TruckersMP\APIClient\Models;

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
     * @param string $dll
     * @param string $adb
     */
    public function __construct(string $dll, string $adb)
    {
        $this->dll = $dll;
        $this->adb = $adb;
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
