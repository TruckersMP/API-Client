<?php

namespace TruckersMP\APIClient\Models;

use TruckersMP\APIClient\Client;

/**
 * The base class for entity models.
 */
abstract class Model
{
    /**
     * The TruckersMP API client.
     *
     * @var Client
     */
    protected Client $client;

    /**
     * The raw object data from the API.
     *
     * @var array
     */
    protected array $data;

    /**
     * Create a new Model instance.
     *
     * @param  Client  $client
     * @param  array  $data
     * @return void
     */
    public function __construct(Client $client, array $data)
    {
        $this->client = $client;
        $this->data = $data;
    }

    /**
     * Return a value by key.
     *
     * This supports the dot notation.
     *
     * @param  string  $key
     * @param  mixed|null  $default
     * @return mixed|null
     */
    protected function getValue(string $key, $default = null)
    {
        if (strpos($key, '.') === false) {
            return $this->data[$key] ?? $default;
        }

        $data = $this->data;

        foreach (explode('.', $key) as $part) {
            if (!is_array($data) || !array_key_exists($part, $data)) {
                return $default;
            }

            $data = &$data[$part];
        }

        return $data;
    }

    /**
     * Convert the model into a pure array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
