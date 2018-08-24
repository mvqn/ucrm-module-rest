<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\Collections\CollectionException;
use UCRM\REST\Endpoints\Collections\QuoteItemCollection;
use UCRM\REST\Endpoints\Collections\QuoteTaxCollection;
use UCRM\REST\Endpoints\Helpers\QuoteHelper;
use UCRM\REST\Endpoints\Lookups\QuoteItem;
use UCRM\REST\Endpoints\Lookups\QuoteTax;

/**
 * Class Quote
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/quotes" }
 * @endpoints { "getById": "/quotes/:id" }
 * @endpoints { "post": "/clients/:clientId/quotes" }
 * @endpoints { "patch": "/quotes/:id" }
 */
final class Quote extends Endpoint
{
    use QuoteHelper;

    // =================================================================================================================
    // ENUMS
    // -----------------------------------------------------------------------------------------------------------------

    public const STATUS_OPEN      = 0;
    public const STATUS_ACCEPTED  = 1;
    public const STATUS_REJECTED  = 2;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $clientId;

    /**
     * @return int|null
     */
    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    /**
     * @param int $value
     * @return Quote
     */
    public function setClientId(int $value): Quote
    {
        $this->clientId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $number;

    /**
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setNumber(string $value): Quote
    {
        $this->number = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $createdDate;

    /**
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }

    /**
     * @param \DateTime $value
     * @return Quote
     */
    public function setCreatedDate(\DateTime $value): Quote
    {
        $this->createdDate = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $notes;

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setNotes(string $value): Quote
    {
        $this->notes = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $adminNotes;

    /**
     * @return string|null
     */
    public function getAdminNotes(): ?string
    {
        return $this->adminNotes;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setAdminNotes(string $value): Quote
    {
        $this->adminNotes = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $quoteTemplateId;

    /**
     * @return int|null
     */
    public function getQuoteTemplateId(): ?int
    {
        return $this->quoteTemplateId;
    }

    /**
     * @param int $value
     * @return Quote
     */
    public function setQuoteTemplateId(int $value): Quote
    {
        $this->quoteTemplateId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $organizationName;

    /**
     * @return string|null
     */
    public function getOrganizationName(): ?string
    {
        return $this->organizationName;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setOrganizationName(string $value): Quote
    {
        $this->organizationName = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $organizationRegistrationNumber;

    /**
     * @return string|null
     */
    public function getOrganizationRegistrationNumber(): ?string
    {
        return $this->organizationRegistrationNumber;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setOrganizationRegistrationNumber(string $value): Quote
    {
        $this->organizationRegistrationNumber = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $organizationTaxId;

    /**
     * @return string|null
     */
    public function getOrganizationTaxId(): ?string
    {
        return $this->organizationTaxId;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setOrganizationTaxId(string $value): Quote
    {
        $this->organizationTaxId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $organizationStreet1;

    /**
     * @return string|null
     */
    public function getOrganizationStreet1(): ?string
    {
        return $this->organizationStreet1;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setOrganizationStreet1(string $value): Quote
    {
        $this->organizationStreet1 = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $organizationStreet2;

    /**
     * @return string|null
     */
    public function getOrganizationStreet2(): ?string
    {
        return $this->organizationStreet2;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setOrganizationStreet2(string $value): Quote
    {
        $this->organizationStreet2 = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $organizationCity;

    /**
     * @return string|null
     */
    public function getOrganizationCity(): ?string
    {
        return $this->organizationCity;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setOrganizationCity(string $value): Quote
    {
        $this->organizationCity = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $organizationCountryId;

    /**
     * @return int|null
     */
    public function getOrganizationCountryId(): ?int
    {
        return $this->organizationCountryId;
    }

    /**
     * @param int $value
     * @return Quote
     */
    public function setOrganizationCountryId(int $value): Quote
    {
        $this->organizationCountryId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $organizationStateId;

    /**
     * @return int|null
     */
    public function getOrganizationStateId(): ?int
    {
        return $this->organizationStateId;
    }

    /**
     * @param int $value
     * @return Quote
     */
    public function setOrganizationStateId(int $value): Quote
    {
        $this->organizationStateId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $organizationZipCode;

    /**
     * @return string|null
     */
    public function getOrganizationZipCode(): ?string
    {
        return $this->organizationZipCode;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setOrganizationZipCode(string $value): Quote
    {
        $this->organizationZipCode = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $organizationBankAccountName;

    /**
     * @return string|null
     */
    public function getOrganizationBankAccountName(): ?string
    {
        return $this->organizationBankAccountName;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setOrganizationBankAccountName(string $value): Quote
    {
        $this->organizationBankAccountName = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $organizationBankAccountField1;

    /**
     * @return string|null
     */
    public function getOrganizationBankAccountField1(): ?string
    {
        return $this->organizationBankAccountField1;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setOrganizationBankAccountField1(string $value): Quote
    {
        $this->organizationBankAccountField1 = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $organizationBankAccountField2;

    /**
     * @return string|null
     */
    public function getOrganizationBankAccountField2(): ?string
    {
        return $this->organizationBankAccountField2;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setOrganizationBankAccountField2(string $value): Quote
    {
        $this->organizationBankAccountField2 = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $clientFirstName;

    /**
     * @return string|null
     */
    public function getClientFirstName(): ?string
    {
        return $this->clientFirstName;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setClientFirstName(string $value): Quote
    {
        $this->clientFirstName = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $clientLastName;

    /**
     * @return string|null
     */
    public function getClientLastName(): ?string
    {
        return $this->clientLastName;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setClientLastName(string $value): Quote
    {
        $this->clientLastName = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $clientCompanyName;

    /**
     * @return string|null
     */
    public function getClientCompanyName(): ?string
    {
        return $this->clientCompanyName;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setClientCompanyName(string $value): Quote
    {
        $this->clientCompanyName = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $clientCompanyRegistrationNumber;

    /**
     * @return string|null
     */
    public function getClientCompanyRegistrationNumber(): ?string
    {
        return $this->clientCompanyRegistrationNumber;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setClientCompanyRegistrationNumber(string $value): Quote
    {
        $this->clientCompanyRegistrationNumber = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $clientCompanyTaxId;

    /**
     * @return string|null
     */
    public function getClientCompanyTaxId(): ?string
    {
        return $this->clientCompanyTaxId;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setClientCompanyTaxId(string $value): Quote
    {
        $this->clientCompanyTaxId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $clientStreet1;

    /**
     * @return string|null
     */
    public function getClientStreet1(): ?string
    {
        return $this->clientStreet1;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setClientStreet1(string $value): Quote
    {
        $this->clientStreet1 = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $clientStreet2;

    /**
     * @return string|null
     */
    public function getClientStreet2(): ?string
    {
        return $this->clientStreet2;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setClientStreet2(string $value): Quote
    {
        $this->clientStreet2 = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $clientCity;

    /**
     * @return string|null
     */
    public function getClientCity(): ?string
    {
        return $this->clientCity;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setClientCity(string $value): Quote
    {
        $this->clientCity = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $clientCountryId;

    /**
     * @return int|null
     */
    public function getClientCountryId(): ?int
    {
        return $this->clientCountryId;
    }

    /**
     * @param int $value
     * @return Quote
     */
    public function setClientCountryId(int $value): Quote
    {
        $this->clientCountryId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $clientStateId;

    /**
     * @return int|null
     */
    public function getClientStateId(): ?int
    {
        return $this->clientStateId;
    }

    /**
     * @param int $value
     * @return Quote
     */
    public function setClientStateId(int $value): Quote
    {
        $this->clientStateId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $clientZipCode;

    /**
     * @return string|null
     */
    public function getClientZipCode(): ?string
    {
        return $this->clientZipCode;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setClientZipCode(string $value): Quote
    {
        $this->clientZipCode = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var QuoteItem[]
     * @post-required
     * @patch
     *
     * @keepNullElements
     */
    protected $items;

    /**
     * @return QuoteItemCollection
     * @throws CollectionException
     */
    public function getItems(): QuoteItemCollection
    {
        return new QuoteItemCollection($this->items);
    }

    /**
     * @param QuoteItemCollection $value
     * @return Quote
     */
    public function setItems(QuoteItemCollection $value): Quote
    {
        $this->items = $value->elements();
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     */
    protected $subtotal;

    /**
     * @return float|null
     */
    public function getSubtotal(): ?float
    {
        return $this->subtotal;
    }

    /**
     * @param float $value
     * @return Quote
     */
    public function setSubtotal(float $value): Quote
    {
        $this->subtotal = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     */
    protected $discount;

    /**
     * @return float|null
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param float $value
     * @return Quote
     */
    public function setDiscount(float $value): Quote
    {
        $this->discount = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $discountLabel;

    /**
     * @return string|null
     */
    public function getDiscountLabel(): ?string
    {
        return $this->discountLabel;
    }

    /**
     * @param string $value
     * @return Quote
     */
    public function setDiscountLabel(string $value): Quote
    {
        $this->discountLabel = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var QuoteTax[]
     * @patch
     */
    protected $taxes;

    /**
     * @return QuoteTaxCollection
     * @throws CollectionException
     */
    public function getTaxes(): QuoteTaxCollection
    {
        return new QuoteTaxCollection($this->taxes);
    }

    /**
     * @param QuoteTaxCollection $value
     * @return Quote
     */
    public function setTaxes(QuoteTaxCollection $value): Quote
    {
        $this->taxes = $value->elements();
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     */
    protected $total;

    /**
     * @return float|null
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

    /**
     * @param float $value
     * @return Quote
     */
    public function setTotal(float $value): Quote
    {
        $this->total = $value;
        return $this;
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

    /**
     * @param string $value
     * @return Quote
     */
    public function setCurrencyCode(string $value): Quote
    {
        $this->currencyCode = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $status;

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int $value
     * @return Quote
     */
    public function setStatus(int $value): Quote
    {
        $this->status = $value;
        return $this;
    }

}
