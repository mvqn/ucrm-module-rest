<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\Collections\Exceptions\CollectionException;
use UCRM\REST\Endpoints\Collections\InvoiceItemCollection;
use UCRM\REST\Endpoints\Collections\InvoiceTaxCollection;
use UCRM\REST\Endpoints\Collections\PaymentCoverCollection;
use UCRM\REST\Endpoints\Helpers\InvoiceHelper;
use UCRM\REST\Endpoints\Lookups\InvoiceItem;
use UCRM\REST\Endpoints\Lookups\InvoiceTax;
use UCRM\REST\Endpoints\Lookups\PaymentCover;

/**
 * Class Invoice
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/invoices" }
 * @endpoints { "getById": "/invoices/:id" }
 * @endpoints { "post": "/clients/:clientId/invoices" }
 * @endpoints { "patch": "/invoices/:id" }
 */
final class Invoice extends Endpoint
{
    use InvoiceHelper;

    // =================================================================================================================
    // ENUMS
    // -----------------------------------------------------------------------------------------------------------------

    public const STATUS_DRAFT           = 0;
    public const STATUS_UNPAID          = 1;
    public const STATUS_PARTIALLY_PAID  = 2;
    public const STATUS_PAID            = 3;
    public const STATUS_VOID            = 4;

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
     * @return Invoice
     */
    public function setClientId(int $value): Invoice
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
     * @return Invoice
     */
    public function setNumber(string $value): Invoice
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
     * @return Invoice
     */
    public function setCreatedDate(\DateTime $value): Invoice
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
    protected $emailSentDate;

    /**
     * @return string|null
     */
    public function getEmailSentDate(): ?string
    {
        return $this->emailSentDate;
    }

    /**
     * @param \DateTime $value
     * @return Invoice
     */
    public function setEmailSentDate(\DateTime $value): Invoice
    {
        $this->emailSentDate = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $maturityDays;

    /**
     * @return int|null
     */
    public function getMaturityDays(): ?int
    {
        return $this->maturityDays;
    }

    /**
     * @param int $value
     * @return Invoice
     */
    public function setMaturityDays(int $value): Invoice
    {
        $this->maturityDays = $value;
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
     * @return Invoice
     */
    public function setNotes(string $value): Invoice
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
     * @return Invoice
     */
    public function setAdminNotes(string $value): Invoice
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
    protected $invoiceTemplateId;

    /**
     * @return int|null
     */
    public function getInvoiceTemplateId(): ?int
    {
        return $this->invoiceTemplateId;
    }

    /**
     * @param int $value
     * @return Invoice
     */
    public function setInvoiceTemplateId(int $value): Invoice
    {
        $this->invoiceTemplateId = $value;
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
     * @return Invoice
     */
    public function setOrganizationName(string $value): Invoice
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
     * @return Invoice
     */
    public function setOrganizationRegistrationNumber(string $value): Invoice
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
     * @return Invoice
     */
    public function setOrganizationTaxId(string $value): Invoice
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
     * @return Invoice
     */
    public function setOrganizationStreet1(string $value): Invoice
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
     * @return Invoice
     */
    public function setOrganizationStreet2(string $value): Invoice
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
     * @return Invoice
     */
    public function setOrganizationCity(string $value): Invoice
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
     * @return Invoice
     */
    public function setOrganizationCountryId(int $value): Invoice
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
     * @return Invoice
     */
    public function setOrganizationStateId(int $value): Invoice
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
     * @return Invoice
     */
    public function setOrganizationZipCode(string $value): Invoice
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
     * @return Invoice
     */
    public function setOrganizationBankAccountName(string $value): Invoice
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
     * @return Invoice
     */
    public function setOrganizationBankAccountField1(string $value): Invoice
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
     * @return Invoice
     */
    public function setOrganizationBankAccountField2(string $value): Invoice
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
     * @return Invoice
     */
    public function setClientFirstName(string $value): Invoice
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
     * @return Invoice
     */
    public function setClientLastName(string $value): Invoice
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
     * @return Invoice
     */
    public function setClientCompanyName(string $value): Invoice
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
     * @return Invoice
     */
    public function setClientCompanyRegistrationNumber(string $value): Invoice
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
     * @return Invoice
     */
    public function setClientCompanyTaxId(string $value): Invoice
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
     * @return Invoice
     */
    public function setClientStreet1(string $value): Invoice
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
     * @return Invoice
     */
    public function setClientStreet2(string $value): Invoice
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
     * @return Invoice
     */
    public function setClientCity(string $value): Invoice
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
     * @return Invoice
     */
    public function setClientCountryId(int $value): Invoice
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
     * @return Invoice
     */
    public function setClientStateId(int $value): Invoice
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
     * @return Invoice
     */
    public function setClientZipCode(string $value): Invoice
    {
        $this->clientZipCode = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $dueDate;

    /**
     * @return string|null
     */
    public function getDueDate(): ?string
    {
        return $this->dueDate;
    }

    /**
     * @param \DateTime $value
     * @return Invoice
     */
    public function setDueDate(\DateTime $value): Invoice
    {
        $this->dueDate = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var InvoiceItem[]
     * @post-required
     * @patch
     *
     * @keepNullElements
     */
    protected $items;

    /**
     * @return InvoiceItemCollection
     * @throws CollectionException
     */
    public function getItems(): InvoiceItemCollection
    {
        return new InvoiceItemCollection($this->items);
    }

    /**
     * @param InvoiceItemCollection $value
     * @return Invoice
     */
    public function setItems(InvoiceItemCollection $value): Invoice
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
     * @return Invoice
     */
    public function setSubtotal(float $value): Invoice
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
     * @return Invoice
     */
    public function setDiscount(float $value): Invoice
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
     * @return Invoice
     */
    public function setDiscountLabel(string $value): Invoice
    {
        $this->discountLabel = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var InvoiceTax[]
     * @patch
     */
    protected $taxes;

    /**
     * @return InvoiceTaxCollection
     * @throws CollectionException
     */
    public function getTaxes(): InvoiceTaxCollection
    {
        return new InvoiceTaxCollection($this->taxes);
    }

    /**
     * @param InvoiceTaxCollection $value
     * @return Invoice
     */
    public function setTaxes(InvoiceTaxCollection $value): Invoice
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
     * @return Invoice
     */
    public function setTotal(float $value): Invoice
    {
        $this->total = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     */
    protected $amountPaid;

    /**
     * @return float|null
     */
    public function getAmountPaid(): ?float
    {
        return $this->amountPaid;
    }

    /**
     * @param float $value
     * @return Invoice
     */
    public function setAmountPaid(float $value): Invoice
    {
        $this->amountPaid = $value;
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
     * @return Invoice
     */
    public function setCurrencyCode(string $value): Invoice
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
     * @return Invoice
     */
    public function setStatus(int $value): Invoice
    {
        $this->status = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var PaymentCover[]
     * @patch
     */
    protected $paymentCovers;

    /**
     * @return PaymentCoverCollection
     * @throws CollectionException
     */
    public function getPaymentCovers(): PaymentCoverCollection
    {
        return new PaymentCoverCollection($this->paymentCovers);
    }

    /**
     * @param PaymentCoverCollection $value
     * @return Invoice
     */
    public function setPaymentCovers(PaymentCoverCollection $value): Invoice
    {
        $this->paymentCovers = $value->elements();
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     * @patch
     */
    protected $uncollectible;

    /**
     * @return bool|null
     */
    public function getUncollectible(): ?bool
    {
        return $this->uncollectible;
    }

    /**
     * @param bool $value
     * @return Invoice
     */
    public function setUncollectible(bool $value): Invoice
    {
        $this->uncollectible = $value;
        return $this;
    }
}



