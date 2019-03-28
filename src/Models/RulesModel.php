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
    protected $rules;

    /**
     * The current rules revision.
     *
     * @var int
     */
    protected $revision;

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
