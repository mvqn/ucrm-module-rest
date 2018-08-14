<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\{Country, Exceptions\EndpointException, State};

trait OrganizationStateHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return null|State
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getOrganizationState(): ?State
    {
        if(property_exists($this, "organizationStateId") && $this->{"organizationStateId"} !== null)
            $state = State::getById($this->{"organizationStateId"});

        /** @var State|null $state */
        return $state;
    }

    /**
     * @param State $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setOrganizationState(State $value): self
    {
        $this->{"organizationStateId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $name
     * @return OrganizationStateHelpers
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function setOrganizationStateByName(string $name): self
    {
        if(!property_exists($this, "organizationCountryId") || $this->{"organizationCountryId"} === null)
            throw new EndpointException("Organization Country ID must be set before the use of any Endpoint->".
                "setOrganizationStateByName()!");

        /** @var Country $country */
        $country = Country::getById($this->{"organizationCountryId"});

        /** @var State $state */
        $state = $country->getStates()->where("name", $name)->first();
        $this->{"organizationStateId"} = $state->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $code
     * @return OrganizationStateHelpers
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function setOrganizationStateByCode(string $code): self
    {
        if(!property_exists($this, "organizationCountryId") || $this->{"organizationCountryId"} === null)
            throw new EndpointException("Organization Country ID must be set before the use of any Endpoint->".
                "setOrganizationStateByCode()!");

        /** @var Country $country */
        $country = Country::getById($this->{"invoiceCountryId"});

        /** @var State $state */
        $state = $country->getStates()->where("code", $code)->first();
        $this->{"organizationStateId"} = $state->getId();

        /** @var self $this */
        return $this;
    }
}