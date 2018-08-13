<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\{Country, Exceptions\EndpointException, State};

trait InvoiceStateHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    public function getInvoiceState(): ?State
    {
        if(property_exists($this, "invoiceStateId") && $this->{"invoiceStateId"} !== null)
            $state = State::getById($this->{"invoiceStateId"});

        /** @var State|null $state */
        return $state;
    }

    /**
     * @param State $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setInvoiceState(State $value): self
    {
        $this->{"invoiceStateId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

    public function setInvoiceStateByName(string $name): self
    {
        if(!property_exists($this, "invoiceCountryId") || $this->{"invoiceCountryId"} === null)
            throw new EndpointException("Country ID must be set before the use of Client->setStateByName()!");

        /** @var Country $country */
        $country = Country::getById($this->{"invoiceCountryId"});

        /** @var State $state */
        $state = $country->getStates()->where("name", $name)->first();
        $this->{"invoiceStateId"} = $state->getId();

        /** @var self $this */
        return $this;
    }

    public function setInvoiceStateByCode(string $code): self
    {
        if(!property_exists($this, "invoiceCountryId") || $this->{"invoiceCountryId"} === null)
            throw new EndpointException("Country ID must be set before the use of Client->setStateByName()!");

        /** @var Country $country */
        $country = Country::getById($this->{"invoiceCountryId"});

        /** @var State $state */
        $state = $country->getStates()->where("code", $code)->first();
        $this->{"invoiceStateId"} = $state->getId();

        /** @var self $this */
        return $this;
    }
}