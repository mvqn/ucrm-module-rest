<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Country;

trait ClientCountryHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return null|Country
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
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
     * @return self
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function setClientCountryByName(string $name): self
    {
        /** @var Country $country */
        $country = Country::getByName($name)->first();
        $this->{"clientCountryId"} = $country->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $code
     * @return self
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
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