<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;
use UCRM\REST\Exceptions\RestClientException;



/**
 * Class Client
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/clients", "getById": "/clients/:id" }
 * @endpoints { "post": "/clients" }
 * @endpoints { "patch": "/clients" }
 *
 */
final class Client extends Endpoint
{
    /** @const string  */
    //protected const ENDPOINT = "/clients";



    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int|null
     */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $userIdent;

    /**
     * @return string
     */
    public function getUserIdent(): string
    {
        return $this->userIdent;
    }

    /**
     * @param string $value
     */
    public function setUserIdent(string $value)
    {
        $this->userIdent = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @post
     * @patch
     */
    protected $organizationId;

    /**
     * @return int
     */
    public function getOrganizationId(): int
    {
        return $this->organizationId;
    }

    /**
     * @param int $value
     */
    public function setOrganizationId(int $value)
    {
        $this->organizationId = $value;
    }

    /**
     * @var Organization $organization
     */
    protected $organization = null;

    /**
     * @return Organization
     * @throws RestClientException
     */
    public function getOrganization(): Organization
    {
        // Cache the value here for future lookups...
        if($this->organization === null && $this->organizationId !== null)
            $this->organization = Organization::getById($this->organizationId);

        return $this->organization;
    }

    /**
     * @param Organization $value
     */
    public function setOrganization(Organization $value)
    {
        $this->organizationId = $value->getId();
        $this->organization = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var bool
     * @post
     * @patch
     */
    protected $isLead;

    /**
     * @return bool
     */
    public function getIsLead(): bool
    {
        return $this->isLead;
    }

    /**
     * @param bool $value
     */
    public function setIsLead(bool $value)
    {
        $this->isLead = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @post
     * @patch
     */
    protected $clientType;

    /**
     * @return int
     */
    public function getClientType(): int
    {
        return $this->clientType;
    }

    /**
     * @param int $value
     */
    public function setClientType(int $value)
    {
        $this->clientType = $value;
    }

    // TODO: Create lookup functionality for ClientType.

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $companyName;

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $value
     */
    public function setCompanyName(string $value)
    {
        $this->companyName = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $companyRegistrationNumber;

    /**
     * @return string
     */
    public function getCompanyRegistrationNumber(): string
    {
        return $this->companyRegistrationNumber;
    }

    /**
     * @param string $value
     */
    public function setCompanyRegistrationNumber(string $value)
    {
        $this->companyRegistrationNumber = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $companyTaxId;

    /**
     * @return string
     */
    public function getCompanyTaxId(): string
    {
        return $this->companyTaxId;
    }

    /**
     * @param string $value
     */
    public function setCompanyTaxId(string $value)
    {
        $this->companyTaxId = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $companyWebsite;

    /**
     * @return string
     */
    public function getCompanyWebsite(): string
    {
        return $this->companyWebsite;
    }

    /**
     * @param string $value
     */
    public function setCompanyWebsite(string $value)
    {
        $this->companyWebsite = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $companyContactFirstName;

    /**
     * @return string
     */
    public function getCompanyContactFirstName(): string
    {
        return $this->companyContactFirstName;
    }

    /**
     * @param string $value
     */
    public function setCompanyContactFirstName(string $value)
    {
        $this->companyContactFirstName = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $companyContactLastName;

    /**
     * @return string
     */
    public function getCompanyContactLastName(): string
    {
        return $this->companyContactLastName;
    }

    /**
     * @param string $value
     */
    public function setCompanyContactLastName(string $value)
    {
        $this->companyContactLastName = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $firstName;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $value
     */
    public function setFirstName(string $value)
    {
        $this->firstName = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $lastName;

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $value
     * @return Endpoint
     */
    public function setLastName(string $value): Endpoint
    {
        $this->lastName = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $street1;

    /**
     * @return string
     */
    public function getStreet1(): string
    {
        return $this->street1;
    }

    /**
     * @param string $value
     */
    public function setStreet1(string $value)
    {
        $this->street1 = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $street2;

    /**
     * @return string
     */
    public function getStreet2(): string
    {
        return $this->street2;
    }

    /**
     * @param string $value
     */
    public function setStreet2(string $value)
    {
        $this->street2 = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $city;

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $value
     */
    public function setCity(string $value)
    {
        $this->city = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @post
     * @patch
     */
    protected $countryId;

    /**
     * @return int
     */
    public function getCountryId(): int
    {
        return $this->countryId;
    }

    /**
     * @param int $value
     */
    public function setCountryId(int $value)
    {
        $this->countryId = $value;
    }

    /**
     * @var Country $country
     */
    private $country = null;

    /**
     * @return Country
     * @throws RestClientException
     */
    public function getCountry(): Country
    {
        // Cache the value here for future lookups...
        if($this->country === null)
            $this->country = Country::getById($this->countryId);

        return $this->country;
    }

    /**
     * @param Country $value
     */
    public function setCountry(Country $value)
    {
        $this->countryId = $value->getId();
        $this->country = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @post
     * @patch
     */
    protected $stateId;

    /**
     * @return int
     */
    public function getStateId(): int
    {
        return $this->stateId;
    }

    /**
     * @param int $value
     */
    public function setStateId(int $value)
    {
        $this->stateId = $value;
    }

    /**
     * @var State $state
     */
    private $state = null;

    /**
     * @return State
     * @throws RestClientException
     */
    public function getState(): State
    {
        // Cache the value here for future lookups...
        if($this->state === null && $this->stateId !== null)
            $this->state = State::getById($this->stateId);

        return $this->state;
    }

    /**
     * @param State $value
     */
    public function setState(State $value)
    {
        $this->stateId = $value->getId();
        $this->state = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $zipCode;

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @param string $value
     */
    public function setZipCode(string $value)
    {
        $this->zipCode = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var bool
     * @post
     * @patch
     */
    protected $invoiceAddressSameAsContact;

    /**
     * @return bool
     */
    public function getInvoiceAddressSameAsContact(): bool
    {
        return $this->invoiceAddressSameAsContact;
    }

    /**
     * @param bool $value
     */
    public function setInvoiceAddressSameAsContact(bool $value)
    {
        $this->invoiceAddressSameAsContact = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $invoiceStreet1;

    /**
     * @return string
     */
    public function getInvoiceStreet1(): string
    {
        return $this->invoiceStreet1;
    }

    /**
     * @param string $value
     */
    public function setInvoiceStreet1(string $value)
    {
        $this->invoiceStreet1 = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $invoiceStreet2;

    /**
     * @return string
     */
    public function getInvoiceStreet2(): string
    {
        return $this->invoiceStreet2;
    }

    /**
     * @param string $value
     */
    public function setInvoiceStreet2(string $value)
    {
        $this->invoiceStreet2 = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $invoiceCity;

    /**
     * @return string
     */
    public function getInvoiceCity(): string
    {
        return $this->invoiceCity;
    }

    /**
     * @param string $value
     */
    public function setInvoiceCity(string $value)
    {
        $this->invoiceCity = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @post
     * @patch
     */
    protected $invoiceCountryId;

    /**
     * @return int|null
     */
    public function getInvoiceCountryId(): ?int
    {
        return $this->invoiceCountryId;
    }

    /**
     * @param int $value
     */
    public function setInvoiceCountryId(int $value)
    {
        $this->invoiceCountryId = $value;
    }

    /**
     * @var Country $invoiceCountry
     */
    private $invoiceCountry = null;

    /**
     * @return Country
     * @throws RestClientException
     */
    public function getInvoiceCountry(): ?Country
    {
        // Cache the value here for future lookups...
        if($this->invoiceCountry === null && $this->invoiceCountryId !== null)
            $this->invoiceCountry = Country::getById($this->invoiceCountryId);

        return $this->invoiceCountry;
    }

    /**
     * @param Country $value
     */
    public function setInvoiceCountry(Country $value)
    {
        $this->invoiceCountryId = $value->getId();
        $this->invoiceCountry = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @post
     * @patch
     */
    protected $invoiceStateId;

    /**
     * @return int|null
     */
    public function getInvoiceStateId(): ?int
    {
        return $this->invoiceStateId;
    }

    /**
     * @param int $value
     */
    public function setInvoiceStateId(int $value)
    {
        $this->invoiceStateId = $value;
    }

    /**
     * @var State $invoiceState
     */
    private $invoiceState = null;

    /**
     * @return State|null
     * @throws RestClientException
     */
    public function getInvoiceState(): ?State
    {
        // Cache the value here for future lookups...
        if($this->invoiceState === null && $this->invoiceState !== null)
            $this->invoiceState = State::getById($this->invoiceStateId);

        return $this->invoiceState;
    }

    /**
     * @param State $value
     */
    public function setInvoiceState(State $value)
    {
        $this->invoiceStateId = $value->getId();
        $this->invoiceState = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $invoiceZipCode;

    /**
     * @return string
     */
    public function getInvoiceZipCode(): string
    {
        return $this->invoiceZipCode;
    }

    /**
     * @param string $value
     */
    public function setInvoiceZipCode(string $value)
    {
        $this->invoiceZipCode = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var bool
     * @post
     * @patch
     */
    protected $sendInvoiceByPost;

    /**
     * @return bool
     */
    public function getSendInvoiceByPost(): bool
    {
        return $this->sendInvoiceByPost;
    }

    /**
     * @param bool $value
     */
    public function setSendInvoiceByPost(bool $value)
    {
        $this->sendInvoiceByPost = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @post
     * @patch
     */
    protected $invoiceMaturityDays;

    /**
     * @return int
     */
    public function getInvoiceMaturityDays(): int
    {
        return $this->invoiceMaturityDays;
    }

    /**
     * @param int $value
     */
    public function setInvoiceMaturityDays(int $value)
    {
        $this->invoiceMaturityDays = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var bool
     * @post
     * @patch
     */
    protected $stopServiceDue;

    /**
     * @return bool
     */
    public function getStopServiceDue(): bool
    {
        return $this->stopServiceDue;
    }

    /**
     * @param bool $value
     */
    public function setStopServiceDue(bool $value)
    {
        $this->stopServiceDue = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @post
     * @patch
     */
    protected $stopServiceDueDays;

    /**
     * @return int
     */
    public function getStopServiceDueDays(): int
    {
        return $this->stopServiceDueDays;
    }

    /**
     * @param int $value
     */
    public function setStopServiceDueDays(int $value)
    {
        $this->stopServiceDueDays = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @post
     * @patch
     */
    protected $tax1Id;

    /**
     * @return int
     */
    public function getTax1Id(): int
    {
        return $this->tax1Id;
    }

    /**
     * @param int $value
     */
    public function setTax1Id(int $value)
    {
        $this->tax1Id = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @post
     * @patch
     */
    protected $tax2Id;

    /**
     * @return int
     */
    public function getTax2Id(): int
    {
        return $this->tax2Id;
    }

    /**
     * @param int $value
     */
    public function setTax2Id(int $value)
    {
        $this->tax2Id = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @post
     * @patch
     */
    protected $tax3Id;

    /**
     * @return int
     */
    public function getTax3Id(): int
    {
        return $this->tax3Id;
    }

    /**
     * @param int $value
     */
    public function setTax3Id(int $value)
    {
        $this->tax3Id = $value;
    }

    // TODO: Add lookup functionality for TaxIDs ???

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $registrationDate;

    /**
     * @return string
     */
    public function getRegistrationDate(): string
    {
        return $this->registrationDate;
    }

    /**
     * @param string $value
     */
    public function setRegistrationDate(string $value)
    {
        $this->registrationDate = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $previousIsp;

    /**
     * @return string
     */
    public function getPreviousIsp(): string
    {
        return $this->previousIsp;
    }

    /**
     * @param string $value
     */
    public function setPreviousIsp(string $value)
    {
        $this->previousIsp = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $note;

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $value
     */
    public function setNote(string $value)
    {
        $this->note = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $username;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $value
     */
    public function setUsername(string $value)
    {
        $this->username = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $avatarColor;

    /**
     * @return string
     */
    public function getAvatarColor(): string
    {
        return $this->avatarColor;
    }

    /**
     * @param string $value
     */
    public function setAvatarColor(string $value)
    {
        $this->avatarColor = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var ClientContact[]
     * @post
     * @patch
     */
    protected $contacts;

    /**
     * @return ClientContact[]
     */
    public function getContacts(): array
    {
        $contacts = [];
        foreach($this->contacts as $contact)
        {
            $contacts[] = new ClientContact($contact);
        }

        //return $this->contacts;
        return $contacts;
    }

    /**
     * @param ClientContact[] $values
     */
    public function setContacts(array $values)
    {
        $contacts = [];
        foreach($values as $value)
        {
            $contacts[] = $value->toFields();
        }

        $this->contacts = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var ClientContactAttribute[]
     * @post
     * @patch
     */
    protected $attributes;

    /**
     * @return ClientContactAttribute[]
     */
    public function getAttributes(): array
    {
        $attributes = [];

        foreach($this->attributes as $attribute)
            $attributes[] = new ClientContactAttribute($attribute);

        return $attributes;

        //return $this->attributes;
    }

    /**
     * @param ClientContactAttribute[] $value
     */
    public function setAttributes(array $value)
    {


        $this->attributes = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var float
     */
    protected $accountBalance;

    /**
     * @return float
     */
    public function getAccountBalance(): float
    {
        return $this->accountBalance;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var float
     */
    protected $accountCredit;

    /**
     * @return float
     */
    public function getAccountCredit(): float
    {
        return $this->accountCredit;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var float
     */
    protected $accountOutstanding;

    /**
     * @return float
     */
    public function getAccountOutstanding(): float
    {
        return $this->accountOutstanding;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $currencyCode;

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $organizationName;

    /**
     * @return string
     */
    public function getOrganizationName(): string
    {
        return $this->organizationName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var ContactBankAccount[]
     */
    protected $bankAccounts;

    /**
     * @return ContactBankAccount[]
     */
    public function getBankAccounts(): array
    {
        return $this->bankAccounts;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $invitationEmailSentDate;

    /**
     * @return string
     */
    public function getInvitationEmailSentDate(): string
    {
        return $this->invitationEmailSentDate;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var ClientContactTag[]
     */
    protected $tags;

    /**
     * @return ClientContactTag[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }



    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @return Endpoint|null
     */
    public function sendInvitationEmail(): ?Endpoint
    {
        return Client::patch($this->id, null, "/send-invitation");
    }







    /**
     * @return Endpoint|null
     * @throws RestClientException
     */
    public function insert(): ?Endpoint
    {
        return Client::post($this);
    }


    /**
     * @return Endpoint|null
     */
    public function update(): ?Endpoint
    {
        return Client::patch($this->id, $this);
    }



}



