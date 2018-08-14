<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Lookups\{
    ClientBankAccount,
    ClientContact,
    ClientContactAttribute,
    ClientTag
};

use UCRM\REST\Endpoints\Collections\{
    ClientBankAccountCollection,
    ClientContactCollection,
    ClientContactAttributeCollection,
    ClientTagCollection
};

/**
 * Class Client
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/clients", "getById": "/clients/:id" }
 * @endpoints { "post": "/clients" }
 * @endpoints { "patch": "/clients/:id" }
 *
 */
final class Client extends Endpoint
{
    use Helpers\ClientHelper;

    // =================================================================================================================
    // ENUMS
    // -----------------------------------------------------------------------------------------------------------------

    public const CLIENT_TYPE_RESIDENTIAL = 1;
    public const CLIENT_TYPE_COMMERCIAL = 2;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $userIdent;

    /**
     * @return string|null
     */
    public function getUserIdent(): ?string
    {
        return $this->userIdent;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setUserIdent(string $value): Client
    {
        $this->userIdent = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post-required
     * @patch-required
     */
    protected $organizationId;

    /**
     * @return int|null
     */
    public function getOrganizationId(): ?int
    {
        return $this->organizationId;
    }

    /**
     * @param int $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setOrganizationId(int $value): Client
    {
        $this->organizationId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     * @post-required
     * @patch-required
     */
    protected $isLead;

    /**
     * @return bool|null
     */
    public function getIsLead(): ?bool
    {
        return $this->isLead;
    }

    /**
     * @param bool $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setIsLead(bool $value): Client
    {
        $this->isLead = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post-required
     * @patch-required
     */
    protected $clientType;

    /**
     * @return int|null
     */
    public function getClientType(): ?int
    {
        return $this->clientType;
    }

    /**
     * @param int $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setClientType(int $value): Client
    {
        $this->clientType = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $companyName;

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setCompanyName(string $value): Client
    {
        $this->companyName = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $companyRegistrationNumber;

    /**
     * @return string|null
     */
    public function getCompanyRegistrationNumber(): ?string
    {
        return $this->companyRegistrationNumber;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setCompanyRegistrationNumber(string $value): Client
    {
        $this->companyRegistrationNumber = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $companyTaxId;

    /**
     * @return string|null
     */
    public function getCompanyTaxId(): ?string
    {
        return $this->companyTaxId;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setCompanyTaxId(string $value): Client
    {
        $this->companyTaxId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $companyWebsite;

    /**
     * @return string|null
     */
    public function getCompanyWebsite(): ?string
    {
        return $this->companyWebsite;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setCompanyWebsite(string $value): Client
    {
        $this->companyWebsite = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $companyContactFirstName;

    /**
     * @return string|null
     */
    public function getCompanyContactFirstName(): ?string
    {
        return $this->companyContactFirstName;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setCompanyContactFirstName(string $value): Client
    {
        $this->companyContactFirstName = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $companyContactLastName;

    /**
     * @return string|null
     */
    public function getCompanyContactLastName(): ?string
    {
        return $this->companyContactLastName;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setCompanyContactLastName(string $value): Client
    {
        $this->companyContactLastName = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch-required
     */
    protected $firstName;

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setFirstName(string $value): Client
    {
        $this->firstName = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $lastName;

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setLastName(string $value): Client
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
     * @return string|null
     */
    public function getStreet1(): ?string
    {
        return $this->street1;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setStreet1(string $value): Client
    {
        $this->street1 = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $street2;

    /**
     * @return string|null
     */
    public function getStreet2(): ?string
    {
        return $this->street2;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setStreet2(string $value): Client
    {
        $this->street2 = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $city;

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setCity(string $value): Client
    {
        $this->city = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $countryId;

    /**
     * @return int|null
     */
    public function getCountryId(): ?int
    {
        return $this->countryId;
    }

    /**
     * @param int $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setCountryId(int $value): Client
    {
        $this->countryId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $stateId;

    /**
     * @return int|null
     */
    public function getStateId(): ?int
    {
        return $this->stateId;
    }

    /**
     * @param int $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setStateId(int $value): Client
    {
        $this->stateId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $zipCode;

    /**
     * @return string|null
     */
    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setZipCode(string $value): Client
    {
        $this->zipCode = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     * @post
     * @patch-required
     */
    protected $invoiceAddressSameAsContact;

    /**
     * @return bool|null
     */
    public function getInvoiceAddressSameAsContact(): ?bool
    {
        return $this->invoiceAddressSameAsContact;
    }

    /**
     * @param bool $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setInvoiceAddressSameAsContact(bool $value): Client
    {
        $this->invoiceAddressSameAsContact = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $invoiceStreet1;

    /**
     * @return string|null
     */
    public function getInvoiceStreet1(): ?string
    {
        return $this->invoiceStreet1;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setInvoiceStreet1(string $value): Client
    {
        $this->invoiceStreet1 = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $invoiceStreet2;

    /**
     * @return string|null
     */
    public function getInvoiceStreet2(): ?string
    {
        return $this->invoiceStreet2;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setInvoiceStreet2(string $value): Client
    {
        $this->invoiceStreet2 = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $invoiceCity;

    /**
     * @return string|null
     */
    public function getInvoiceCity(): ?string
    {
        return $this->invoiceCity;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setInvoiceCity(string $value): Client
    {
        $this->invoiceCity = $value;
        return $this;
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
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setInvoiceCountryId(int $value): Client
    {
        $this->invoiceCountryId = $value;
        return $this;
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
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setInvoiceStateId(int $value): Client
    {
        $this->invoiceStateId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $invoiceZipCode;

    /**
     * @return string|null
     */
    public function getInvoiceZipCode(): ?string
    {
        return $this->invoiceZipCode;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setInvoiceZipCode(string $value): Client
    {
        $this->invoiceZipCode = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     * @post
     * @patch
     */
    protected $sendInvoiceByPost;

    /**
     * @return bool|null
     */
    public function getSendInvoiceByPost(): ?bool
    {
        return $this->sendInvoiceByPost;
    }

    /**
     * @param bool $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setSendInvoiceByPost(bool $value): Client
    {
        $this->sendInvoiceByPost = $value;
        return $this;
    }

    /**
     * @return Client
     */
    public function resetSendInvoiceByPost(): Client
    {
        $this->sendInvoiceByPost = null;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $invoiceMaturityDays;

    /**
     * @return int|null
     */
    public function getInvoiceMaturityDays(): ?int
    {
        return $this->invoiceMaturityDays;
    }

    /**
     * @param int $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setInvoiceMaturityDays(int $value): Client
    {
        $this->invoiceMaturityDays = $value;
        return $this;
    }

    /**
     * @return Client
     */
    public function resetInvoiceMaturityDays(): Client
    {
        $this->invoiceMaturityDays = null;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     * @post
     * @patch
     */
    protected $stopServiceDue;

    /**
     * @return bool|null
     */
    public function getStopServiceDue(): ?bool
    {
        return $this->stopServiceDue;
    }

    /**
     * @param bool $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setStopServiceDue(bool $value): Client
    {
        $this->stopServiceDue = $value;
        return $this;
    }

    /**
     * @return Client
     */
    public function resetStopServiceDue(): Client
    {
        $this->stopServiceDue = null;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $stopServiceDueDays;

    /**
     * @return int|null
     */
    public function getStopServiceDueDays(): ?int
    {
        return $this->stopServiceDueDays;
    }

    /**
     * @param int $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setStopServiceDueDays(int $value): Client
    {
        $this->stopServiceDueDays = $value;
        return $this;
    }

    /**
     * @return Client
     */
    public function resetStopServiceDueDays(): Client
    {
        $this->stopServiceDueDays = null;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $tax1Id;

    /**
     * @return int|null
     */
    public function getTax1Id(): ?int
    {
        return $this->tax1Id;
    }

    /**
     * @param int $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setTax1Id(int $value): Client
    {
        $this->tax1Id = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $tax2Id;

    /**
     * @return int|null
     */
    public function getTax2Id(): ?int
    {
        return $this->tax2Id;
    }

    /**
     * @param int $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setTax2Id(int $value): Client
    {
        $this->tax2Id = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $tax3Id;

    /**
     * @return int|null
     */
    public function getTax3Id(): ?int
    {
        return $this->tax3Id;
    }

    /**
     * @param int $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setTax3Id(int $value): Client
    {
        $this->tax3Id = $value;
        return $this;
    }

    // TODO: Add lookup functionality for TaxIDs ???

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch-required
     */
    protected $registrationDate;

    /**
     * @return string|null
     */
    public function getRegistrationDate(): ?string
    {
        return $this->registrationDate;
    }

    /**
     * @param \DateTime $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setRegistrationDate(\DateTime $value): Client
    {
        $this->registrationDate = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $previousIsp;

    /**
     * @return string|null
     */
    public function getPreviousIsp(): ?string
    {
        return $this->previousIsp;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setPreviousIsp(string $value): Client
    {
        $this->previousIsp = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $note;

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setNote(string $value): Client
    {
        $this->note = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $username;

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setUsername(string $value): Client
    {
        $this->username = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $avatarColor;

    /**
     * @return string|null
     */
    public function getAvatarColor(): ?string
    {
        return $this->avatarColor;
    }

    /**
     * @param string $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setAvatarColor(string $value): Client
    {
        $this->avatarColor = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var ClientContact[]
     * @post
     * @patch
     */
    protected $contacts;

    /**
     * @return ClientContactCollection
     * @throws \MVQN\Collections\CollectionException
     */
    public function getContacts(): ClientContactCollection
    {
        /** @var ClientContactCollection $contacts */
        $contacts = new ClientContactCollection($this->contacts);
        return $contacts;
    }

    /**
     * @param ClientContactCollection $values
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setContacts(ClientContactCollection $values): Client
    {
        $this->contacts = $values->elements();
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var ClientContactAttribute[]
     * @post
     * @patch
     */
    protected $attributes;

    /**
     * @return ClientContactAttributeCollection
     * @throws \MVQN\Collections\CollectionException
     */
    public function getAttributes(): ClientContactAttributeCollection
    {
        /** @var ClientContactAttributeCollection $attributes */
        $attributes = new ClientContactAttributeCollection($this->attributes);
        return $attributes;
    }

    /**
     * @param ClientContactAttributeCollection $values
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setAttributes(ClientContactAttributeCollection $values): Client
    {
        $this->attributes = $values->elements();
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     */
    protected $accountBalance;

    /**
     * @return float|null
     */
    public function getAccountBalance(): ?float
    {
        return $this->accountBalance;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     */
    protected $accountCredit;

    /**
     * @return float|null
     */
    public function getAccountCredit(): ?float
    {
        return $this->accountCredit;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     */
    protected $accountOutstanding;

    /**
     * @return float|null
     */
    public function getAccountOutstanding(): ?float
    {
        return $this->accountOutstanding;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $currencyCode;

    /**
     * @return string|null
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $organizationName;

    /**
     * @return string|null
     */
    public function getOrganizationName(): ?string
    {
        return $this->organizationName;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var ClientBankAccount[]
     */
    protected $bankAccounts;

    /**
     * @return ClientBankAccountCollection
     * @throws \MVQN\Collections\CollectionException
     */
    public function getBankAccounts(): ClientBankAccountCollection
    {
        /** @var ClientBankAccountCollection $bankAccounts */
        $bankAccounts = new ClientBankAccountCollection($this->bankAccounts);
        return $bankAccounts;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $invitationEmailSentDate;

    /**
     * @return string|null
     */
    public function getInvitationEmailSentDate(): ?string
    {
        return $this->invitationEmailSentDate;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var ClientTag[]
     */
    protected $tags;

    /**
     * @return ClientTagCollection
     * @throws \MVQN\Collections\CollectionException
     */
    public function getTags(): ClientTagCollection
    {
        /** @var ClientTagCollection $tags */
        $tags = new ClientTagCollection($this->tags);
        return $tags;
    }


}



