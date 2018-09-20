<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Collections\CountryCollection;
use UCRM\REST\Endpoints\Country;

/**
 * Trait ClientCountryHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait ClientCountryHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Country|null
     * @throws \Exception
     */
    public function getClientCountry(): ?Country
    {
        if(property_exists($this, "clientCountryId") && $this->{"clientCountryId"} !== null)
            $country = Country::getById($this->{"clientCountryId"});

        /** @var Country $country */
        return $country;
    }

    /**
     * @param Country $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setClientCountry(Country $value): self
    {
        $this->{"clientCountryId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $name
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws \Exception
     */
    public function setClientCountryByName(string $name): self
    {
        /** @var CountryCollection $countries */
        $countries = Country::getByName($name);

        /** @var Country $country */
        $country = $countries->first();
        $this->{"clientCountryId"} = $country->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $code
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws \Exception
     */
    public function setClientCountryByCode(string $code): self
    {
        /** @var Country $country */
        $country = Country::getByCode($code);
        $this->{"clientCountryId"} = $country->getId();

        /** @var self $this */
        return $this;
    }


}