<?php

namespace TruckersMP\Models;

class RulesModel
{
    /**
     * The rules formatted in Markdown.
     *
     * @var string
     */
    public $rules;

    /**
     * The current rules revision.
     *
     * @var int
     */
    public $revision;

    /**
     * RulesModel constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->rules = $response['rules'];
        $this->revision = $response['revision'];
    }
}
