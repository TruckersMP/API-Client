<?php

namespace TruckersMP\Models;

use TruckersMP\Exceptions\APIErrorException;

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
     * @throws APIErrorException
     */
    public function __construct(array $response)
    {
        if ($response['error']) {
            throw new APIErrorException('There was an error fetching the rules.');
        }

        $this->rules = $response['rules'];
        $this->revision = $response['revision'];
    }
}
