<?php

namespace TruckersMP\APIClient\Requests;

use TruckersMP\APIClient\Models\Rule;

class RuleRequest extends Request
{
    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'rules';
    }

    /**
     * Get the data for the request.
     *
     * @return Rule
     *
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\APIClient\Exceptions\PageNotFoundException
     * @throws \TruckersMP\APIClient\Exceptions\RequestException
     */
    public function get(): Rule
    {
        return new Rule(
            $this->send()
        );
    }
}
