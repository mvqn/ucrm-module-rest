<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use MVQN\Annotations\Exceptions\AnnotationReaderException;
use MVQN\Collections\Exceptions\CollectionException;
use MVQN\Helpers\Exceptions\ArrayHelperException;
use MVQN\Helpers\Exceptions\PatternMatchException;

use UCRM\REST\Exceptions\RestClientException;
use UCRM\REST\Endpoints\Exceptions\EndpointException;

use UCRM\REST\Endpoints\{Country, State};

/**
 * Trait OrganizationStateHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait OrganizationStateHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return State|null
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
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
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
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
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
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