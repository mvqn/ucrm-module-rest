<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;
use UCRM\REST\Exceptions\RestClientException;


/**
 * Class State
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "", "getById": "/countries/states/:id" }
 */
final class State extends Endpoint
{
    /** @const string  */
    //protected const ENDPOINT = "/states";

    /** @const string  */
    //protected const ENDPOINT_PARENT = "/countries";



    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     */
    protected $countryId;

    /**
     * @return int
     */
    public function getCountryId(): int
    {
        return $this->countryId;
    }

    /**
     * @var Country $country
     */
    protected $country = null;

    /**
     * @return Country
     * @throws RestClientException
     */
    public function getCountry(): Country
    {
        // Cache the value here for future lookups...
        if($this->country === null)
            $this->country = Country::getById($this->countryId);

        return $this->country;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $code;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }



}



