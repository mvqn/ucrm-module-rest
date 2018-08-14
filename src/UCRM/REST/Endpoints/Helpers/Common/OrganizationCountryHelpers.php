<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Country;

trait OrganizationCountryHelpers
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
     * @return OrganizationCountryHelpers
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function setOrganizationCountryByName(string $name): self
    {
        /** @var Country $country */
        $country = Country::getByName($name)->first();
        $this->{"organizationCountryId"} = $country->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $code
     * @return OrganizationCountryHelpers
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
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