<?php

namespace Tests\Unit;

trait MockModelData
{
    /**
     * Load up data from a fixture file.
     *
     * @param  string  $file
     * @return array
     */
    protected function getFixtureData(string $file): array
    {
        $contents = file_get_contents(__DIR__ . '/Models/fixtures/' . $file);

        return json_decode($contents, true, 512, JSON_BIGINT_AS_STRING);
    }
}
