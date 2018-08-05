<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;
use UCRM\REST\Exceptions\RestClientException;


/**
 * Class Organization
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class Organization extends Endpoint
{
    /** @const string  */
    protected const ENDPOINT = "/organizations";



    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $registrationNumber;

    /**
     * @return string
     */
    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $taxId;

    /**
     * @return string
     */
    public function getTaxId(): string
    {
        return $this->taxId;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $phone;

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $email;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $website;

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $street1;

    /**
     * @return string
     */
    public function getStreet1(): string
    {
        return $this->street1;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $street2;

    /**
     * @return string
     */
    public function getStreet2(): string
    {
        return $this->street2;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $city;

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $countryId;

    /**
     * @return int
     */
    public function getCountryId(): int
    {
        return $this->countryId;
    }

    /** @var Country $country */
    protected $country = null;

    /**
     * @return Country
     */
    public function getCountry(): Country
    {
        // Cache the value here for future lookups...
        if($this->country === null)
            $this->country = Country::getById($this->countryId);

        return $this->country;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $stateId;

    /**
     * @return int
     */
    public function getStateId(): int
    {
        return $this->stateId;
    }

    /** @var State $state */
    protected $state = null;

    /**
     * @return State
     */
    public function getState(): State
    {
        // Cache the value here for future lookups...
        if($this->state === null)
            $this->state = State::getById($this->stateId);

        return $this->state;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $zipCode;

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    protected $selected;

    /**
     * @return bool
     */
    public function getSelected(): bool
    {
        return $this->selected;
    }

}



