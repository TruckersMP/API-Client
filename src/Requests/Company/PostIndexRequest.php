<?php

namespace TruckersMP\APIClient\Requests\Company;

use Illuminate\Support\Collection;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Client;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\CompanyPost;
use TruckersMP\APIClient\Requests\Request;

class PostIndexRequest extends Request
{
    /**
     * The ID or slug of the requested company.
     *
     * @var string|int
     */
    protected $companyKey;

    /**
     * Create a new PostIndexRequest instance.
     *
     * @param  Client  $client
     * @param  string|int  $companyKey
     * @return void
     */
    public function __construct(Client $client, $companyKey)
    {
        parent::__construct($client);

        $this->companyKey = $companyKey;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyKey . '/news';
    }

    /**
     * Get the data for the request.
     *
     * @return Collection|CompanyPost[]
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): Collection
    {
        return (new Collection($this->send()['response']['news']))
            ->map(fn (array $post) => new CompanyPost($this->client, $post));
    }
}
