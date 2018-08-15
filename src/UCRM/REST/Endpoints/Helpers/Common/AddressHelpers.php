<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use MVQN\Annotations\Exceptions\AnnotationReaderException;
use MVQN\Collections\Exceptions\CollectionException;
use MVQN\Helpers\Exceptions\PatternMatchException;

use UCRM\REST\Endpoints\Country;
use UCRM\REST\Endpoints\Exceptions\EndpointException;
use UCRM\REST\Endpoints\State;
use UCRM\REST\Exceptions\RestClientException;

trait AddressHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $street
     * @param string $city
     * @param string $stateCode
     * @param string $countryCode
     * @param string $zip
     * @return self
     * @throws AnnotationReaderException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function setAddress(string $street, string $city, string $stateCode, string $countryCode, string $zip): self
    {
        $street1 = "";
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