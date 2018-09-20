<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;
use MVQN\REST\Annotations\PostAnnotation as Post;
use MVQN\REST\Annotations\PostRequiredAnnotation as PostRequired;
use MVQN\REST\Annotations\PatchAnnotation as Patch;
use MVQN\REST\Annotations\PatchRequiredAnnotation as PatchRequired;

use UCRM\REST\Endpoints\Lookups\ClientBankAccount;
use UCRM\REST\Endpoints\Lookups\ClientContact;
use UCRM\REST\Endpoints\Lookups\ClientContactAttribute;
use UCRM\REST\Endpoints\Lookups\ClientTag;

use UCRM\REST\Endpoints\Collections\ClientBankAccountCollection;
use UCRM\REST\Endpoints\Collections\ClientContactCollection;
use UCRM\REST\Endpoints\Collections\ClientContactAttributeCollection;
use UCRM\REST\Endpoints\Collections\ClientTagCollection;


/**
 * Class Client
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/clients", "getById": "/clients/:id" }
 * @Endpoint { "post": "/clients" }
 * @Endpoint { "patch": "/clients/:id" }
 *
 * @method string|null getUserIdent()
 * @method Client setUserIdent(string $ident)
 * @method int|null getOrganizationId()
 * @method Client setOrganizationId(int $id)
 * @method bool|null getIsLead()
 * @method Client setIsLead(bool $lead)
 * @method int|null getClientType()
 * @method Client setClientType(int $type)
 * @method string|null getCompanyName()
 * @method Client setCompanyName(string $name)
 * @method string|null getCompanyRegistrationNumber()
 * @method Client setCompanyRegistrationNumber(string $number)
 * @method string|null getCompanyTaxId()
 * @method Client setCompanyTaxId(string $id)
 * @method string|null getCompanyWebsite()
 * @method Client setCompanyWebsite(string $website)
 * @method string|null getCompanyContactFirstName()
 * @method Client setCompanyContactFirstName(string $first)
 * @method string|null getCompanyContactLastName()
 * @method Client setCompanyContactLastName(string $last)
 * @method string|null getFirstName()
 * @method Client setFirstName(string $first)
 * @method string|null getLastName()
 * @method Client setLastName(string $last)
 * @method string|null getStreet1()
 * @method Client setStreet1(string $street1)
 * @method string|null getStreet2()
 * @method Client setStreet2(string $street2)
 * @method string|null getCity()
 * @method Client setCity(string $city)
 * @method int|null getCountryId()
 * @method Client setCountryId(int $id)
 * @method int|null getStateId()
 * @method Client setStateId(int $id)
 * @method string|null getZipCode()
 * @method Client setZipCode(string $zip)
 * @method bool|null getInvoiceAddressSameAsContact()
 * @method Client setInvoiceAddressSameAsContact(bool $same)
 * @method string|null getInvoiceStreet1()
 * @method Client setInvoiceStreet1(string $street1)
 * @method string|null getInvoiceStreet2()
 * @method Client setInvoiceStreet2(string $street2)
 * @method string|null getInvoiceCity()
 * @method Client setInvoiceCity(string $city)
 * @method int|null getInvoiceCountryId()
 * @method Client setInvoiceCountryId(int $id)
 * @method int|null getInvoiceStateId()
 * @method Client setInvoiceStateId(int $id)
 * @method string|null getInvoiceZipCode()
 * @method Client setInvoiceZipCode(string $zip)
 * @method bool|null getSendInvoiceByPost()
 * @method Client setSendInvoiceByPost(bool $send)
 * @method int|null getInvoiceMaturityDays()
 * @method Client setInvoiceMaturityDays(int $days)
 * @method bool|null getStopServiceDue()
 * @method Client setStopServiceDue(bool $stop)
 * @method int|null getStopServiceDueDays()
 * @method Client setStopServiceDueDays(int $days)
 * @method int|null getTax1Id()
 * @method Client setTax1Id(int $id)
 * @method int|null getTax2Id()
 * @method Client setTax2Id(int $id)
 * @method int|null getTax3Id()
 * @method Client setTax3Id(int $id)
 * @method string|null getRegistrationDate()
 * @see    Client::setRegistrationDate()
 * @method string|null getPreviousIsp()
 * @method Client setPreviousIsp(string $isp)
 * @method string|null getNote()
 * @method Client setNote(string $note)
 * @method string|null getUsername()
 * @method Client setUsername(string $username)
 * @method string|null getAvatarColor()
 * @method Client setAvatarColor(string $color)
 * @see    Client::getContacts()
 * @see    Client::setContacts()
 * @see    Client::getAttributes()
 * @see    Client::setAttributes()
 * @method float|null getAccountBalance()
 * @method float|null getAccountCredit()
 * @method float|null getAccountOutstanding()
 * @method string|null getCurrencyCode()
 * @method string|null getOrganizationName()
 * @see    Client::getBankAccounts()
 * @method string|null getInvitationEmailSentDate()
 * @see    Client::getTags()
 *
 */
final class Client extends EndpointObject
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
     * @Post
     * @Patch
     * @Unique
     */
    protected $userIdent;

    /**
     * @var int
     * @PostRequired
     * @PatchRequired
     */
    protected $organizationId;

    /**
     * @var bool
     * @PostRequired
     * @PatchRequired
     */
    protected $isLead;

    /**
     * @var int
     * @PostRequired
     * @PatchRequired
     */
    protected $clientType;

    /**
     * @var string
     * @PostRequired `$this->clientType === Client::CLIENT_TYPE_COMMERCIAL`
     * @PatchRequired `$this->clientType === Client::CLIENT_TYPE_COMMERCIAL`
     */
    protected $companyName;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $companyRegistrationNumber;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $companyTaxId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $companyWebsite;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $companyContactFirstName;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $companyContactLastName;

    /**
     * @var string
     * @PostRequired `$this->clientType === Client::CLIENT_TYPE_RESIDENTIAL`
     * @PatchRequired `$this->clientType === Client::CLIENT_TYPE_RESIDENTIAL`
     */
    protected $firstName;

    /**
     * @var string
     * @PostRequired `$this->clientType === Client::CLIENT_TYPE_RESIDENTIAL`
     * @PatchRequired `$this->clientType === Client::CLIENT_TYPE_RESIDENTIAL`
     */
    protected $lastName;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $street1;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $street2;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $city;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $countryId;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $stateId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $zipCode;

    /**
     * @var bool
     * @PostRequired
     * @PatchRequired
     */
    protected $invoiceAddressSameAsContact;

    /**
     * @var string
     * @PostRequired `! $this->invoiceAddressSameAsContact`
     * @PatchRequired `! $this->invoiceAddressSameAsContact`
     */
    protected $invoiceStreet1;

    /**
     * @var string
     * @PostRequired `! $this->invoiceAddressSameAsContact`
     * @PatchRequired `! $this->invoiceAddressSameAsContact`
     */
    protected $invoiceStreet2;

    /**
     * @var string
     * @PostRequired `! $this->invoiceAddressSameAsContact`
     * @PatchRequired `! $this->invoiceAddressSameAsContact`
     */
    protected $invoiceCity;

    /**
     * @var int
     * @PostRequired `! $this->invoiceAddressSameAsContact`
     * @PatchRequired `! $this->invoiceAddressSameAsContact`
     */
    protected $invoiceCountryId;

    /**
     * @var int
     * @PostRequired `! $this->invoiceAddressSameAsContact`
     * @PatchRequired `! $this->invoiceAddressSameAsContact`
     */
    protected $invoiceStateId;

    /**
     * @var string
     * @PostRequired `! $this->invoiceAddressSameAsContact`
     * @PatchRequired `! $this->invoiceAddressSameAsContact`
     */
    protected $invoiceZipCode;

    /**
     * @var bool
     * @Post
     * @Patch
     */
    protected $sendInvoiceByPost;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $invoiceMaturityDays;

    /**
     * @var bool
     * @Post
     * @Patch
     */
    protected $stopServiceDue;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $stopServiceDueDays;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $tax1Id;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $tax2Id;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $tax3Id;

    /**
     * @var string
     * @PostRequired
     * @PatchRequired
     */
    protected $registrationDate;

    /**
     * @param \DateTime $value
     * @return Client Returns the Client instance, for method chaining purposes.
     */
    public function setRegistrationDate(\DateTime $value): Client
    {
        $this->registrationDate = $value->format("c");
        return $this;
    }

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $previousIsp;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $note;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $username;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $avatarColor;

    /**
     * @var ClientContact[]
     * @Post
     * @Patch
     */
    protected $contacts;

    /**
     * @return ClientContactCollection
     * @throws \Exception
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

    /**
     * @var ClientContactAttribute[]
     * @Post
     * @Patch
     */
    protected $attributes;

    /**
     * @return ClientContactAttributeCollection
     * @throws \Exception
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

    /**
     * @var float
     */
    protected $accountBalance;

    /**
     * @var float
     */
    protected $accountCredit;

    /**
     * @var float
     */
    protected $accountOutstanding;

    /**
     * @var string
     */
    protected $currencyCode;

    /**
     * @var string
     */
    protected $organizationName;

    /**
     * @var ClientBankAccount[]
     */
    protected $bankAccounts;

    /**
     * @return ClientBankAccountCollection
     * @throws \Exception
     */
    public function getBankAccounts(): ClientBankAccountCollection
    {
        /** @var ClientBankAccountCollection $bankAccounts */
        $bankAccounts = new ClientBankAccountCollection($this->bankAccounts);
        return $bankAccounts;
    }

    /**
     * @var string
     */
    protected $invitationEmailSentDate;

    /**
     * @var ClientTag[]
     */
    protected $tags;

    /**
     * @return ClientTagCollection
     * @throws \Exception
     */
    public function getTags(): ClientTagCollection
    {
        /** @var ClientTagCollection $tags */
        $tags = new ClientTagCollection($this->tags);
        return $tags;
    }

}



