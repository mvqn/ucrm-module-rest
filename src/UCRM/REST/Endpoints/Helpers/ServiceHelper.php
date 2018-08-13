<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\Collection;
use MVQN\Helpers\ArrayHelperPathException;
use MVQN\Helpers\PatternMatchException;

//use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\{Collections\ClientContactCollection,
    Exceptions\EndpointException,
    Endpoint,
    Organization,
    Client,
    Country,
    ServicePlan,
    State, Service};
use UCRM\REST\Endpoints\Lookups\{ClientBankAccount,ClientContact,ClientContactAttribute,ClientContactType,ClientTag};


trait ServiceHelper
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------


    public function create(): Service
    {
        /** @var Endpoint $data */
        $data = $this;

        /** @var Service $service */
        $service = Service::post($data, ["clientId" => $this->clientId]);

        return $service;
    }




    #region Client/Organization

    /**
     * @return null|ServicePlan
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getServicePlan(): ?ServicePlan
    {
        if($this->servicePlanId !== null)
            $servicePlan = ServicePlan::getById($this->servicePlanId);

        /** @var ServicePlan $servicePlan */
        return $servicePlan;
    }

    /**
     * @param ServicePlan $value
     * @return Service Returns the Service instance, for method chaining purposes.
     */
    public function setServicePlan(ServicePlan $value): Service
    {
        $this->servicePlanId = $value->getId();

        /** @var Service $this */
        return $this;
    }

    /**
     * @param string $name
     * @return Service
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \MVQN\Collections\CollectionException
     * @throws \ReflectionException
     */
    public function setServicePlanByName(string $name): Service
    {
        /** @var ServicePlan $servicePlan */
        $servicePlan = ServicePlan::getByName($name);
        $this->servicePlanId = $servicePlan->getId();

        /** @var Service $this */
        return $this;
    }

    /**
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \MVQN\Collections\CollectionException
     * @throws \ReflectionException
     */
    public function setOrganizationByDefault(): Client
    {
        /** @var Organization $organization */
        $organization = Organization::getByDefault();
        $this->organizationId = $organization->getId();

        /** @var Client $this */
        return $this;
    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region Client/Country

    /**
     * @return null|Country
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getCountry(): ?Country
    {
        if($this->countryId !== null)
            $country = Country::getById($this->countryId);

        /** @var Country $country */
        return $country;
    }

    /**
     * @param Country $value
     * @return Client
     */
    public function setCountry(Country $value): Client
    {
        $this->countryId = $value->getId();

        /** @var Client $this */
        return $this;
    }

    /**
     * @param string $name
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \MVQN\Collections\CollectionException
     * @throws \ReflectionException
     */
    public function setCountryByName(string $name): Client
    {
        /** @var Country $country */
        $country = Country::getByName($name)->first();
        $this->countryId = $country->getId();

        /** @var Client $this */
        return $this;
    }

    /**
     * @param string $code
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \MVQN\Collections\CollectionException
     * @throws \ReflectionException
     */
    public function setCountryByCode(string $code): Client
    {
        /** @var Country $country */
        $country = Country::getByCode($code);
        $this->countryId = $country->getId();

        /** @var Client $this */
        return $this;
    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region Client/State

    /**
     * @return null|State
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getState(): ?State
    {
        if($this->stateId !== null)
            $state = State::getById($this->stateId);

        /** @var State|null $state */
        return $state;
    }

    /**
     * @param State $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setState(State $value): Client
    {
        $this->stateId = $value->getId();

        /** @var Client $this */
        return $this;
    }

    /**
     * @param string $name
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws \MVQN\Collections\CollectionException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function setStateByName(string $name): Client
    {
        if($this->countryId === null)
            throw new EndpointException("Country ID must be set before the use of Client->setStateByName()!");

        /** @var Country $country */
        $country = Country::getById($this->countryId);

        /** @var State $state */
        $state = $country->getStates()->where("name", $name)->first();
        $this->stateId = $state->getId();

        /** @var Client $this */
        return $this;
    }

    /**
     * @param string $code
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws \MVQN\Collections\CollectionException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function setStateByCode(string $code): Client
    {
        if($this->countryId === null)
            throw new EndpointException("Country ID must be set before the use of Client->setStateByName()!");

        /** @var Country $country */
        $country = Country::getById($this->countryId);

        /** @var State $state */
        $state = $country->getStates()->where("code", $code)->first();
        $this->stateId = $state->getId();

        /** @var Client $this */
        return $this;
    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region Client/InvoiceCountry

    /**
     * @return null|Country
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getInvoiceCountry(): ?Country
    {
        if($this->invoiceCountryId !== null)
            $country = Country::getById($this->invoiceCountryId);

        /** @var Country $country */
        return $country;
    }

    /**
     * @param Country $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setInvoiceCountry(Country $value): Client
    {
        $this->invoiceCountryId = $value->getId();

        /** @var Client $this */
        return $this;
    }

    /**
     * @param string $name
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \MVQN\Collections\CollectionException
     * @throws \ReflectionException
     */
    public function setInvoiceCountryByName(string $name): Client
    {
        /** @var Country $country */
        $country = Country::getByName($name)->first();
        $this->invoiceCountryId = $country->getId();

        /** @var Client $this */
        return $this;
    }

    /**
     * @param string $code
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \MVQN\Collections\CollectionException
     * @throws \ReflectionException
     */
    public function setInvoiceCountryByCode(string $code): Client
    {
        /** @var Country $country */
        $country = Country::getByCode($code); // UNIQUE?
        $this->invoiceCountryId = $country->getId();

        /** @var Client $this */
        return $this;
    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region Client/InvoiceState

    /**
     * @return null|State
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getInvoiceState(): ?State
    {
        if($this->invoiceStateId !== null)
            $state = State::getById($this->invoiceStateId);

        /** @var State|null $state */
        return $state;
    }

    /**
     * @param State $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setInvoiceState(State $value): Client
    {
        $this->invoiceStateId = $value->getId();

        /** @var Client $this */
        return $this;
    }

    /**
     * @param string $name
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws \MVQN\Collections\CollectionException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function setInvoiceStateByName(string $name): Client
    {
        if($this->countryId === null)
            throw new EndpointException("Country ID must be set before the use of Client->setStateByName()!");

        /** @var Country $country */
        $country = Country::getById($this->countryId);

        /** @var State $state */
        $state = $country->getStates()->where("name", $name)->first();
        $this->invoiceStateId = $state->getId();

        /** @var Client $this */
        return $this;
    }

    /**
     * @param string $code
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws \MVQN\Collections\CollectionException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function setInvoiceStateByCode(string $code): Client
    {
        if($this->countryId === null)
            throw new EndpointException("Country ID must be set before the use of Client->setStateByName()!");

        /** @var Country $country */
        $country = Country::getById($this->countryId);

        /** @var State $state */
        $state = $country->getStates()->where("code", $code)->first();
        $this->invoiceStateId = $state->getId();

        /** @var Client $this */
        return $this;
    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region Client/Contacts

    /**
     * @param int $id
     * @return null|ClientContact
     * @throws \MVQN\Collections\CollectionException
     */
    public function getContactById(int $id): ?ClientContact
    {
        /** @var ClientContact $contact */
        $contact = (new ClientContactCollection($this->contacts))->where("id", $id)->first();
        return $contact;
    }

    /**
     * @param ClientContact $contact
     * @return Client
     * @throws AnnotationReaderException
     * @throws \ReflectionException
     */
    public function addContact(ClientContact $contact): Client
    {
        $this->contacts[] = $contact->toArray();

        /** @var Client $this */
        return $this;
    }

    // TODO: Add delContact() abilities as they become available.

    #endregion


    public function sendInvitationEmail(): Client
    {
        /** @var Client $client */
        $client = Client::patch($this->id, null, "/send-invitation");
        return $client;
    }

}