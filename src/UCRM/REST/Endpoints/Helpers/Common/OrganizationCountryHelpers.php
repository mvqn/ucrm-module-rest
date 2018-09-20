<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Collections\CountryCollection;
use UCRM\REST\Endpoints\Country;

/**
 * Trait OrganizationCountryHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait OrganizationCountryHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Country|null
     * @throws \Exception
     */
    public function getOrganizationCountry(): ?Country
    {
        if(property_exists($this, "organizationCountryId") && $this->{"organizationCountryId"} !== null)
            $country = Country::getById($this->{"organizationCountryId"});

        /** @var Country $country */
        return $country;
    }

    /**
     * @param Country $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setOrganizationCountry(Country $value): self
    {
        $this->{"organizationCountryId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $name
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws \Exception
     */
    public function setOrganizationCountryByName(string $name): self
    {
        /** @var CountryCollection $countries */
        $countries = Country::getByName($name);

        /** @var Country $country */
        $country = $countries->first();
        $this->{"organizationCountryId"} = $country->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $code
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws \Exception
     */
    public function setOrganizationCountryByCode(string $code): self
    {
        /** @var Country $country */
        $country = Country::getByCode($code);
        $this->{"organizationCountryId"} = $country->getId();

        /** @var self $this */
        return $this;
    }


}