<?php

namespace TruckersMP\APIClient\Models;

use TruckersMP\APIClient\Client;

class Rule extends Model
{
    /**
     * Get the rules.
     *
     * @var string
     */
    protected string $rules;

    /**
     * Get the rules' revision.
     *
     * @var int
     */
    protected int $revision;

    /**
     * Create a new Role instance.
     *
     * @param  Client  $client
     * @param  array  $rules
     * @return void
     */
    public function __construct(Client $client, array $rules)
    {
        parent::__construct($client, $rules);

        $this->rules = $this->getValue('rules');
        $this->revision = $this->getValue('revision');
    }

    /**
     * Get the current rules.
     *
     * @return string
     */
    public function getRules(): string
    {
        return $this->rules;
    }

    /**
     * Get the current revision number of the rules.
     *
     * @return int
     */
    public function getRevision(): int
    {
        return $this->revision;
    }
}
