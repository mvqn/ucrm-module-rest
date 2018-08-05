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
 */
final class Client extends Endpoint
{
    /** @const string  */
    protected const ENDPOINT = "/clients";



    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $userIdent;

    /**
     * @return string
     */
    public function getUserIdent(): string
    {
        return $this->userIdent;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $organizationId;

    /**
     * @return int
     */
    public function getOrganizationId(): int
    {
        return $this->organizationId;
    }

    /** @var Organization $organization */
    protected $organization = null;

    /**
     * @return Organization
     */
    public function getOrganization(): Organization
    {
        // Cache the value here for future lookups...
        if($this->organization === null)
            $this->organization = Organization::getById($this->organizationId);

        return $this->organization;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    protected $isLead;

    /**
     * @return bool
     */
    public function getIsLead(): bool
    {
        return $this->isLead;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $clientType;

    /**
     * @return int
     */
    public function getClientType(): int
    {
        return $this->clientType;
    }

    // TODO: Create lookup functionality for ClientType.

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $companyName;

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $companyRegistrationNumber;

    /**
     * @return string
     */
    public function getCompanyRegistrationNumber(): string
    {
        return $this->companyRegistrationNumber;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $companyTaxId;

    /**
     * @return string
     */
    public function getCompanyTaxId(): string
    {
        return $this->companyTaxId;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $companyWebsite;

    /**
     * @return string
     */
    public function getCompanyWebsite(): string
    {
        return $this->companyWebsite;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $companyContactFirstName;

    /**
     * @return string
     */
    public function getCompanyContactFirstName(): string
    {
        return $this->companyContactFirstName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $companyContactLastName;

    /**
     * @return string
     */
    public function getCompanyContactLastName(): string
    {
        return $this->companyContactLastName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $firstName;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $lastName;

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $street1;

    /**
     * @return string
     */
    public function getStreet1(): string
    {
        return $this->street1;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $street2;

    /**
     * @return string
     */
    public function getStreet2(): string
    {
        return $this->street2;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $city;

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $countryId;

    /**
     * @return int
     */
    public function getCountryId(): int
    {
        return $this->countryId;
    }

    /** @var Country $country */
    protected $country = null;

    /**
     * @return Country
     */
    public function getCountry(): Country
    {
        // Cache the value here for future lookups...
        if($this->country === null)
            $this->country = Country::getById($this->countryId);

        return $this->country;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $stateId;

    /**
     * @return int
     */
    public function getStateId(): int
    {
        return $this->stateId;
    }

    /** @var State $state */
    protected $state = null;

    /**
     * @return State
     */
    public function getState(): State
    {
        // Cache the value here for future lookups...
        if($this->state === null)
            $this->state = State::getById($this->stateId);

        return $this->state;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $zipCode;

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    protected $invoiceAddressSameAsContact;

    /**
     * @return bool
     */
    public function getInvoiceAddressSameAsContact(): bool
    {
        return $this->invoiceAddressSameAsContact;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $invoiceStreet1;

    /**
     * @return string
     */
    public function getInvoiceStreet1(): string
    {
        return $this->invoiceStreet1;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $invoiceStreet2;

    /**
     * @return string
     */
    public function getInvoiceStreet2(): string
    {
        return $this->invoiceStreet2;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $invoiceCity;

    /**
     * @return string
     */
    public function getInvoiceCity(): string
    {
        return $this->invoiceCity;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $invoiceCountryId;

    /**
     * @return int
     */
    public function getInvoiceCountryId(): int
    {
        return $this->invoiceCountryId;
    }

    /** @var Country $invoiceCountry */
    protected $invoiceCountry = null;

    /**
     * @return Country
     */
    public function getInvoiceCountry(): Country
    {
        // Cache the value here for future lookups...
        if($this->invoiceCountry === null)
            $this->invoiceCountry = Country::getById($this->invoiceCountryId);

        return $this->invoiceCountry;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $invoiceStateId;

    /**
     * @return int
     */
    public function getInvoiceStateId(): int
    {
        return $this->invoiceStateId;
    }

    /** @var State $invoiceState */
    protected $invoiceState = null;

    /**
     * @return State
     */
    public function getInvoiceState(): State
    {
        // Cache the value here for future lookups...
        if($this->invoiceState === null)
            $this->invoiceState = State::getById($this->invoiceStateId);

        return $this->invoiceState;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $invoiceZipCode;

    /**
     * @return string
     */
    public function getInvoiceZipCode(): string
    {
        return $this->invoiceZipCode;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    protected $sendInvoiceByPost;

    /**
     * @return bool
     */
    public function getSendInvoiceByPost(): bool
    {
        return $this->sendInvoiceByPost;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $invoiceMaturityDays;

    /**
     * @return int
     */
    public function getInvoiceMaturityDays(): int
    {
        return $this->invoiceMaturityDays;
    }


    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    protected $stopServiceDue;

    /**
     * @return bool
     */
    public function getStopServiceDue(): bool
    {
        return $this->stopServiceDue;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $stopServiceDueDays;

    /**
     * @return int
     */
    public function getStopServiceDueDays(): int
    {
        return $this->stopServiceDueDays;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $taxId1;

    /**
     * @return int
     */
    public function getTaxId1(): int
    {
        return $this->taxId1;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $taxId2;

    /**
     * @return int
     */
    public function getTaxId2(): int
    {
        return $this->taxId2;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $taxId3;

    /**
     * @return int
     */
    public function getTaxId3(): int
    {
        return $this->taxId3;
    }

    // TODO: Add lookup functionality for TaxIDs.

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $registrationDate;

    /**
     * @return string
     */
    public function getRegistrationDate(): string
    {
        return $this->registrationDate;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $previousIsp;

    /**
     * @return string
     */
    public function getPreviousIsp(): string
    {
        return $this->previousIsp;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $note;

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $username;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $avatarColor;

    /**
     * @return string
     */
    public function getAvatarColor(): string
    {
        return $this->avatarColor;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var Contact[]  */
    protected $contacts;

    /**
     * @return Contact[]
     */
    public function getName(): array
    {
        return $this->contacts;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var ContactAttribute[]  */
    protected $attributes;

    /**
     * @return ContactAttribute[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var float  */
    protected $accountBalance;

    /**
     * @return float
     */
    public function getAccountBalance(): float
    {
        return $this->accountBalance;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var float  */
    protected $accountCredit;

    /**
     * @return float
     */
    public function getAccountCredit(): float
    {
        return $this->accountCredit;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var float  */
    protected $accountOutstanding;

    /**
     * @return float
     */
    public function getAccountOutstanding(): float
    {
        return $this->accountOutstanding;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $currencyCode;

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $organizationName;

    /**
     * @return string
     */
    public function getOrganizationName(): string
    {
        return $this->organizationName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var ContactBankAccount[]  */
    protected $bankAccounts;

    /**
     * @return ContactBankAccount[]
     */
    public function getBankAccounts(): array
    {
        return $this->bankAccounts;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $invitationEmailSentDate;

    /**
     * @return string
     */
    public function getInvitationEmailSentDate(): string
    {
        return $this->invitationEmailSentDate;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var ContactTag[]  */
    protected $tags;

    /**
     * @return ContactAttribute[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

}



