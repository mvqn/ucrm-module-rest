<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\CollectionException;
use MVQN\Common\ArraysException;
use MVQN\Common\PatternsException;

use UCRM\REST\Endpoints\EndpointException;
use UCRM\REST\RestClientException;

use UCRM\REST\Endpoints\Country;
use UCRM\REST\Endpoints\State;

/**
 * Trait AddressHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait AddressHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $eol An optional string to use for line endings, defaults to '\n'.
     * @return string Returns the address as a formatted string, similar to the Invoice layout.
     */
    public function getAddress(string $eol = "\n"): string
    {
        /** @var Country $country */
        $country = $this->getCountry();

        /** @var State $state */
        $state = $this->getState();

        $address = "";
        $address .= ($this->getStreet1().$eol);
        $address .= ($this->getStreet2() !== "" ? $this->getStreet2().$eol : "");
        $address .= ($this->getCity().", ".$state->getCode()." ".$this->getZipCode().$eol);
        $address .= ($country->getName());

        return $address;
    }

    /**
     * @param string $street
     * @param string $city
     * @param string $stateCode
     * @param string $countryCode
     * @param string $zip
     * @return AddressHelpers
     *
     * @throws \ReflectionException
     */
    public function setAddress(string $street, string $city, string $stateCode, string $countryCode, string $zip): self
    {
        //$street1 = "";
        $street2 = "";

        if(strpos($street, "\n") !== false)
        {
            $parts = array_map("trim", explode("\n", $street));

            $street1 = $parts[0];
            $street2 = $parts[1];
        }
        elseif(strpos($street, "\r\n") !== false)
        {
            $parts = array_map("trim", explode("\r\n", $street));

            $street1 = $parts[0];
            $street2 = $parts[1];
        }
        else
        {
            $street1 = $street;
        }

        $country = Country::getByCode($countryCode);
        $state = State::getByCode($country, $stateCode);

        $this->{"street1"} = $street1;
        $this->{"street2"} = $street2;
        $this->{"city"} = $city;
        $this->{"countryId"} = $country->getId();
        $this->{"stateId"} = $state->getId();
        $this->{"zipCode"} = $zip;

        /** @var self $this */
        return $this;
    }

}