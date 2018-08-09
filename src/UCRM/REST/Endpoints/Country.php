<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;



use UCRM\REST\Exceptions\RestClientException;
use UCRM\REST\RestClient;

/**
 * Class Country
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/countries", "getById": "/countries/:id" }
 */
final class Country extends Endpoint
{
    /** @const string  */
    //protected const ENDPOINT = "/countries";



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

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var State[] $states
     */
    protected $states = null;

    /**
     * @return State[]
     * @throws RestClientException
     */
    public function getStates(): array
    {
        // Cache the value here for future lookups...
        if($this->states === null)
        {
            $states = RestClient::get("/countries/".$this->id."/states");

            $this->states = [];
            // Loop through each result and cast the value to a State object before adding them to the array...
            foreach ($states as $state)
                $this->states[] = new State($state);
        }

        return $this->states;
    }

}



