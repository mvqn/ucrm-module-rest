<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use MVQN\Annotations\Exceptions\AnnotationReaderException;
use MVQN\Collections\Exceptions\CollectionException;
//use MVQN\Helpers\Exceptions\ArrayHelperException;
use MVQN\Helpers\Exceptions\PatternMatchException;

use UCRM\REST\Endpoints\Exceptions\EndpointException;
use UCRM\REST\Exceptions\RestClientException;

use UCRM\REST\Endpoints\{Country, State};

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
     * @param string $street
     * @param string $city
     * @param string $stateCode
     * @param string $countryCode
     * @param string $zipCode
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws AnnotationReaderException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
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