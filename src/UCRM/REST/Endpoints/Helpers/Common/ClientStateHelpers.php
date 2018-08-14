<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\{Country, Exceptions\EndpointException, State};

trait ClientStateHelpers
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
    public function getClientState(): ?State
    {
        if(property_exists($this, "clientStateId") && $this->{"clientStateId"} !== null)
            $state = State::getById($this->{"clientStateId"});

        /** @var State|null $state */
        return $state;
    }

    /**
     * @param State $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setClientState(State $value): self
    {
        $this->{"clientStateId"} = $value->getId();

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
    public function setClientStateByName(string $name): self
    {
        if(!property_exists($this, "clientCountryId") || $this->{"clientCountryId"} === null)
            throw new EndpointException("Client Country ID must be set before the use of any Endpoint->".
                "setClientStateByName()!");

        /** @var Country $country */
        $country = Country::getById($this->{"clientCountryId"});

        /** @var State $state */
        $state = $country->getStates()->where("name", $name)->first();
        $this->{"clientStateId"} = $state->getId();

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
    public function setClientStateByCode(string $code): self
    {
        if(!property_exists($this, "clientCountryId") || $this->{"clientCountryId"} === null)
            throw new EndpointException("Client Country ID must be set before the use of any Endpoint->".
                "setClientStateByCode()!");

        /** @var Country $country */
        $country = Country::getById($this->{"clientCountryId"});

        /** @var State $state */
        $state = $country->getStates()->where("code", $code)->first();
        $this->{"clientStateId"} = $state->getId();

        /** @var self $this */
        return $this;
    }
}