<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Helpers\ArrayHelperPathException;
use MVQN\Helpers\PatternMatchException;

//use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\{Organization,Client,Country,State};
use UCRM\REST\Endpoints\Lookups\{ClientBankAccount,ClientContact,ClientContactAttribute,ClientContactType,ClientTag};


trait ClientHelper
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    #region Client/Organization

    /**
     * @return null|Organization
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \ReflectionException
     * @throws RestClientException
     */
    public function getOrganization(): ?Organization
    {
        if($this->organizationId !== null)
            $organization = Organization::getById($this->organizationId);

        /** @var Organization $organization */
        return $organization;
    }

    /**
     * @param Organization $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setOrganization(Organization $value): Client
    {
        $this->organizationId = $value->getId();

        /** @var Client $this */
        return $this;
    }

    /**
     * @param string $name
     * @return Organization
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function setOrganizationByName(string $name): Organization
    {
        /** @var Organization $organization */
        $organization = Organization::findFirst("name", $name);
        $this->setOrganization($organization);

        /** @var Organization $this */
        return $this;
    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region Client/Country

    /**
     * @return Country|null
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
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
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function setCountryByName(string $name): Client
    {
        /** @var Country $country */
        $country = Country::findFirst("name", $name);
        $this->setCountry($country);

        /** @var Client $this */
        return $this;
    }

    /**
     * @param string $code
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function setCountryByCode(string $code): Client
    {
        /** @var Country $country */
        $country = Country::findFirst("code", $code);
        $this->setCountry($country);

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
     * @throws RestClientException
     * @throws \ReflectionException
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
     * @param Country|null $country
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws RestObjectException
     * @throws \ReflectionException
     */
    public function setStateByName(string $name, Country $country = null): Client
    {
        return $this->_setStateByColumn("state", "name", $name, $country);
    }

    /**
     * @param string $code
     * @param Country|null $country
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws RestObjectException
     * @throws \ReflectionException
     */
    public function setStateByCode(string $code, Country $country = null): Client
    {
        return $this->_setStateByColumn("state", "code", $code, $country);
    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region Client/InvoiceCountry

    /**
     * @return Country|null
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
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
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function setInvoiceCountryByName(string $name): Client
    {
        /** @var Country $country */
        $country = Country::findFirst("name", $name);
        $this->setInvoiceCountry($country);

        /** @var Client $this */
        return $this;
    }

    /**
     * @param string $code
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function setInvoiceCountryByCode(string $code): Client
    {
        /** @var Country $country */
        $country = Country::findFirst("code", $code);
        $this->setInvoiceCountry($country);

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
     * @throws RestClientException
     * @throws \ReflectionException
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
     * @param string $country
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws RestObjectException
     * @throws \ReflectionException
     */
    public function setInvoiceStateByName(string $name, string $country = ""): Client
    {
        return $this->_setStateByColumn("invoiceState", "name", $name, $country);
    }

    /**
     * @param string $code
     * @param Country|null $country
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws RestObjectException
     * @throws \ReflectionException
     */
    public function setInvoiceStateByCode(string $code, Country $country = null): Client
    {
        return $this->_setStateByColumn("invoiceState", "code", $code, $country);
    }

    #endregion

    // -----------------------------------------------------------------------------------------------------------------

    #region Client/Contacts

    /**
     * @param int $id
     * @param int|null $index
     * @return ClientContact|null
     */
    public function getContactById(int $id, int &$index = null): ?ClientContact
    {
        /** @var ClientContact $contact */
        $contact = $this->getCollectionItemById(ClientContact::class, $this->contacts, $id, $index);
        return $contact;
    }

    /**
     * @param int $id
     * @param ClientContact $contact
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setContactById(int $id, ClientContact $contact): Client
    {
        $this->setCollectionItemById(ClientContact::class, $this->contacts, $id, $contact);

        /** @var Client $this */
        return $this;
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

    // -----------------------------------------------------------------------------------------------------------------

    // Add mode helpers as needed!



    // =================================================================================================================
    // UTILITY METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // NOT TESTED!
    /*
    private function _setPropertyByColumn(string $property, string $column, string $value): Client
    {
        /** @var Endpoint $class * /
        $class = ucfirst($property);

        if(!class_exists($class))
            throw new RestObjectException("Could not find the class '$class'.");

        if(!method_exists($class, "find"))
            throw new RestObjectException("Could not find the method '{$class}::find()'.");

        // Find the country whose column matches the value provided.
        $result = $class::find($column, $value);

        // Do a final check to make certain we have a valid Country!
        if($result === null)
            throw new RestObjectException("{$class}->_setPropertyByColumn()could not reliably determine the $class!");

        // Set the StateId property on this Client object.
        $this->{$property."Id"} = $result->getId();

        /** @var Client $this * /
        return $this;
    }
    */

    /**
     * @param string $property
     * @param string $column
     * @param string $value
     * @param Country|null $country
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws RestObjectException
     * @throws \ReflectionException
     */
    private function _setStateByColumn(string $property, string $column, string $value, Country $country = null): Client
    {
        // Generate the appropriate Country property name, given the provided State property name.
        if(strpos($property, "State") !== false)
            $countryProperty = str_replace("State", "Country", $property);
        else
        if(strpos($property, "state") !== false)
            $countryProperty = str_replace("state", "country", $property);
        else
            $countryProperty = null;

        // If both the CountryId and the provided Country are NULL, throw an exception, we cannot continue!
        if($countryProperty === null || ($country === null && $this->{$countryProperty."Id"} === null))
            throw new RestObjectException("Cannot call Client->_setStateByColumn() without either first setting the ".
                "Country using Client->{$countryProperty}Id, Client->set{$countryProperty}() or providing it as an ".
                "argument to this function!");

        // IF there is a valid CountryId on this Client already AND none was provided to override it...
        if($this->{$countryProperty."Id"} !== null && $country === null)
            // THEN set the country from the Client's CountryId.
            $country = Country::getById($this->{$countryProperty."Id"});

        // Do a final check to make certain we have a valid Country!
        if($country === null)
            throw new RestObjectException("Client->_setStateByColumn()could not reliably determine the Country!");

        // Noew get all of the states for the selected Country.
        $states = $country->getStates();
        // And then find the state in that Country that has the matching column value.
        $state = State::findFirstIn($states->elements(), $column, $value);

        // Set the StateId property on this Client object.
        $this->{$property."Id"} = $state->getId();

        /** @var Client $this */
        return $this;
    }





}