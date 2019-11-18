<?php


namespace TruckersMP\Requests;


use TruckersMP\Models\Company;

class CompanyRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var int
     */
    protected $id;

    /**
     * Create a new CompanyRequest instance.
     *
     * @param array $config
     * @param int $id
     */
    public function __construct(array $config, int $id)
    {
        parent::__construct($config);

        $this->id = $id;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->id;
    }

    /**
     * Get the data for the request.
     *
     * @return Company
     * @throws \Http\Client\Exception
     */
    public function get(): Company
    {
        return new Company(
            $this->call()
        );
    }
}
