<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use MVQN\Annotations\Exceptions\AnnotationReaderException;
use MVQN\Collections\Exceptions\CollectionException;
use MVQN\Helpers\Exceptions\ArrayHelperException;
use MVQN\Helpers\Exceptions\PatternMatchException;

use UCRM\REST\Endpoints\Exceptions\EndpointException;
use UCRM\REST\Exceptions\RestClientException;

use UCRM\REST\Endpoints\{Country, State};

/**
 * Trait ClientStateHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait ClientStateHelpers
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
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
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
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
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