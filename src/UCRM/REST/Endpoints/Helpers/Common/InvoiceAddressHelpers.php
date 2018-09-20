<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Country;
use UCRM\REST\Endpoints\State;

/**
 * Trait InvoiceAddressHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait InvoiceAddressHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $eol An optional string to use for line endings, defaults to '\n'.
     * @return string Returns the address as a formatted string, similar to the Invoice layout.
     */
    public function getInvoiceAddress(string $eol = "\n"): string
    {
        /** @var Country $country */
        $country = $this->getInvoiceCountry();

        /** @var State $state */
        $state = $this->getInvoiceState();

        $address = "";
        $address .= ($this->getInvoiceStreet1().$eol);
        $address .= ($this->getInvoiceStreet2() !== "" ? $this->getInvoiceStreet2().$eol : "");
        $address .= ($this->getInvoiceCity().", ".$state->getCode()." ".$this->getInvoiceZipCode().$eol);
        $address .= ($country->getName());

        return $address;
    }

    /**
     * @param string $street
     * @param string $city
     * @param string $stateCode
     * @param string $countryCode
     * @param string $zipCode
     * @return InvoiceAddressHelpers
     * @throws \Exception
     */
    public function setInvoiceAddress(string $street, string $city, string $stateCode, string $countryCode,
        string $zipCode): self
    {
        $street2 = "";

        // Split the first and second street addresses, if a newline character has been provided...
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

        // Get the country and state by the provided strings.
        $country = Country::getByCode($countryCode);
        $state = State::getByCode($country, $stateCode);

        $sameAsContact = true;

        if ($this->{"street1"} !== $street1 ||
            $this->{"street2"} !== $street2 ||
            $this->{"city"} !== $city ||
            $this->{"countryId"} !== $country->getId() ||
            $this->{"stateId"} !== $state->getId() ||
            $this->{"zipCode"} !== $zipCode)
            $sameAsContact = false;

        // IF the passed invoiceAdddress values are the same as the address values...
        if($sameAsContact)
        {
            // THEN set all the invoiceAddress values to null.
            $this->{"invoiceStreet1"} = null;
            $this->{"invoiceStreet2"} = null;
            $this->{"invoiceCity"} = null;
            $this->{"invoiceCountryId"} = null;
            $this->{"invoiceStateId"} = null;
            $this->{"invoiceZipCode"} = null;

            // AND set the matching flag!
            $this->{"invoiceAddressSameAsContact"} = true;
        }
        else
        {
            // OTHERWISE set all the invoiceAddress values to the provided values.
            $this->{"invoiceStreet1"} = $street1;
            $this->{"invoiceStreet2"} = $street2;
            $this->{"invoiceCity"} = $city;
            $this->{"invoiceCountryId"} = $country->getId();
            $this->{"invoiceStateId"} = $state->getId();
            $this->{"invoiceZipCode"} = $zipCode;

            // AND unset the matching flag!
            $this->{"invoiceAddressSameAsContact"} = false;
        }

        /** @var self $this */
        return $this;
    }

}