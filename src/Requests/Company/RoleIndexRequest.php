<?php

namespace TruckersMP\APIClient\Requests\Company;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Collections\Company\RoleCollection;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
use TruckersMP\APIClient\Requests\Request;

class RoleIndexRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var int
     */
    protected $companyId;

    /**
     * Create a new RoleIndexRequest instance.
     *
     * @param  int  $companyId
     * @return void
     */
    public function __construct(int $companyId)
    {
        parent::__construct();

        $this->companyId = $companyId;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyId . '/roles';
    }

    /**
     * Get the data for the request.
     *
     * @return RoleCollection
     *
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws Exception
     * @throws ClientExceptionInterface
     */
    public function get(): RoleCollection
    {
        return new RoleCollection(
            $this->send()['response']
        );
    }
}
