<?php

namespace TruckersMP\APIClient\Requests;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
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
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): Rule
    {
        return new Rule(
            $this->client,
            $this->send()
        );
    }
}
