<?php

namespace TruckersMP\APIClient\Models;

class Rule
{
    /**
     * Get the rules.
     *
     * @var string
     */
    protected $rules;

    /**
     * Get the rules revision.
     *
     * @var int
     */
    protected $revision;

    /**
     * Create a new Role instance.
     *
     * @param array $rules
     */
    public function __construct(array $rules)
    {
        $this->rules = $rules['rules'];
        $this->revision = $rules['revision'];
    }

    /**
     * @return string
     */
    public function getRules(): string
    {
        return $this->rules;
    }

    /**
     * @return int
     */
    public function getRevision(): int
    {
        return $this->revision;
    }
}
