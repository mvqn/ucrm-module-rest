<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\{Country, State};

/**
 * Trait StateHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait StateHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return State|null
     * @throws \Exception
     */
    public function getState(): ?State
    {
        if(property_exists($this, "stateId") && $this->{"stateId"} !== null)
            $state = State::getById($this->{"stateId"});

        /** @var State|null $state */
        return $state;
    }

    /**
     * @param State $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setState(State $value): self
    {
        $this->{"stateId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $name
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws \Exception
     */
    public function setStateByName(string $name): self
    {
        if(!property_exists($this, "countryId") || $this->{"countryId"} === null)
            throw new \Exception("Country ID must be set before the use of Client->setStateByName()!");

        /** @var Country $country */
        $country = Country::getById($this->{"countryId"});

        /** @var State $state */
        $state = $country->getStates()->where("name", $name)->first();
        $this->{"stateId"} = $state->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $code
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws \Exception
     */
    public function setStateByCode(string $code): self
    {
        if(!property_exists($this, "countryId") || $this->{"countryId"} === null)
            throw new \Exception("Country ID must be set before the use of Client->setStateByName()!");

        /** @var Country $country */
        $country = Country::getById($this->{"countryId"});

        /** @var State $state */
        $state = $country->getStates()->where("code", $code)->first();
        $this->{"stateId"} = $state->getId();

        /** @var self $this */
        return $this;
    }
}