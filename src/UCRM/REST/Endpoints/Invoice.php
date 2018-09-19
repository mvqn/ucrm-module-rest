<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;

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
 * @Endpoint { "get": "/invoices" }
 * @Endpoint { "getById": "/invoices/:id" }
 * @Endpoint { "post": "/clients/:clientId/invoices" }
 * @Endpoint { "patch": "/invoices/:id" }
 *
 * @method int|null getClientId()
 * @method Invoice setClientId(int $id)
 *
 * @method string|null getNumber()
 * @method Invoice setNumber(string $number)
 *
 * @method string|null getCreatedDate()
 * @see Invoice::setCreatedDate()
 *
 * @method string|null getEmailSentDate()
 * @see Invoice::setEmailSentDate()
 *
 * @method int|null getMaturityDays()
 * @method Invoice setMaturityDays(int $day)
 *
 * @method string|null getNotes()
 * @method Invoice setNotes(string $notes)
 *
 * @method string|null getAdminNotes()
 * @method Invoice setAdminNotes(string $notes)
 *
 * @method int|null getInvoiceTemplateId()
 * @method Invoice setInvoiceTemplateId(int $id)
 *
 * @method string|null getOrganizationName()
 * @method Invoice setOrganizationName(string $name)
 *
 * @method string|null getOrganizationRegistrationNumber()
 * @method Invoice setOrganizationRegistrationNumber(string $number)
 *
 * @method string|null getOrganizationTaxId()
 * @method Invoice setOrganizationTaxId(string $id)
 *
 * @method string|null getOrganizationStreet1()
 * @method Invoice setOrganizationStreet1(string $street1)
 *
 * @method string|null getOrganizationStreet2()
 * @method Invoice setOrganizationStreet2(string $street2)
 *
 * @method string|null getOrganizationCity()
 * @method Invoice setOrganizationCity(string $city)
 *
 * @method int|null getOrganizationCountryId()
 * @method Invoice setOrganizationCountryId(int $id)
 *
 * @method int|null getOrganizationStateId()
 * @method Invoice setOrganizationStateId(int $id)
 *
 * @method string|null getOrganizationZipCode()
 * @method Invoice setOrganizationZipCode(string $zip)
 *
 * @method string|null getOrganizationBankAccountName()
 * @method Invoice setOrganizationBankAccountName(string $name)
 *
 * @method string|null getOrganizationBankAccountField1()
 * @method Invoice setOrganizationBankAccountField1(string $field1)
 *
 * @method string|null getOrganizationBankAccountField2()
 * @method Invoice setOrganizationBankAccountField2(string $field2)
 *
 * @method string|null getClientFirstName()
 * @method Invoice setClientFirstName(string $name)
 *
 * @method string|null getClientLastName()
 * @method Invoice setClientLastName(string $name)
 *
 * @method string|null getClientCompanyName()
 * @method Invoice setClientCompanyName(string $name)
 *
 * @method string|null getClientCompanyRegistrationNumber()
 * @method Invoice setClientCompanyRegistrationNumber(string $name)
 *
 * @method string|null getClientCompanyTaxId()
 * @method Invoice setClientCompanyTaxId(string $id)
 *
 * @method string|null getClientStreet1()
 * @method Invoice setClientStreet1(string $street1)
 *
 * @method string|null getClientStreet2()
 * @method Invoice setClientStreet2(string $street2)
 *
 * @method string|null getClientCity()
 * @method Invoice setClientCity(string $city)
 *
 * @method int|null getClientCountryId()
 * @method Invoice setClientCountryId(int $id)
 *
 * @method int|null getClientStateId()
 * @method Invoice setClientStateId(int $id)
 *
 * @method string|null getClientZipCode()
 * @method Invoice setClientZipCode(string $zip)
 *
 * @method string|null getDueDate()
 * @see Invoice::setDueDate()
 *
 * @see Invoice::getItems()
 * @see Invoice::setItems()
 *
 * @method float|null getSubtotal()
 * @method Invoice setSubtotal(float $subtotal)
 *
 * @method float|null getDiscount()
 * @method Invoice setDiscount(float $discount)
 *
 * @method string|null getDiscountLabel()
 * @method Invoice setDiscountLabel(string $label)
 *
 * @see Invoice::getTaxes()
 * @see Invoice::setTaxes()
 *
 * @method float|null getTotal()
 * @method Invoice setTotal(float $total)
 *
 * @method float|null getAmountPaid()
 * @method Invoice setAmountPaid(float $amount)
 *
 * @method string|null getCurrencyCode()
 * @method Invoice setCurrencyCode(string $code)
 *
 * @method int|null getStatus()
 * @method Invoice setStatus(int $status)
 *
 * @see Invoice::setPaymentCovers()
 * @see Invoice::setPaymentCovers()
 *
 * @method bool|null getUncollectible()
 * @method Invoice setUncollectible(bool $uncollectible)
 *
 */
final class Invoice extends EndpointObject
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

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $clientId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $number;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $createdDate;

    /**
     * @param \DateTime $value
     * @return Invoice
     */
    public function setCreatedDate(\DateTime $value): Invoice
    {
        $this->createdDate = $value->format("c");
        return $this;
    }

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $emailSentDate;

    /**
     * @param \DateTime $value
     * @return Invoice
     */
    public function setEmailSentDate(\DateTime $value): Invoice
    {
        $this->emailSentDate = $value->format("c");
        return $this;
    }

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $maturityDays;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $notes;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $adminNotes;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $invoiceTemplateId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationName;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationRegistrationNumber;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationTaxId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationStreet1;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationStreet2;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationCity;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $organizationCountryId;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $organizationStateId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationZipCode;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationBankAccountName;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationBankAccountField1;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $organizationBankAccountField2;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientFirstName;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientLastName;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientCompanyName;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientCompanyRegistrationNumber;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientCompanyTaxId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientStreet1;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientStreet2;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientCity;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $clientCountryId;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $clientStateId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $clientZipCode;

    /**
     * @var string
     */
    protected $dueDate;

    /**
     * @param \DateTime $value
     * @return Invoice
     */
    public function setDueDate(\DateTime $value): Invoice
    {
        $this->dueDate = $value->format("c");
        return $this;
    }

    /**
     * @var InvoiceItem[]
     * @PostRequired
     * @Patch
     *
     * @KeepNullElements
     */
    protected $items;

    /**
     * @return InvoiceItemCollection
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

    /**
     * @var float
     */
    protected $subtotal;

    /**
     * @var float
     */
    protected $discount;

    /**
     * @var string
     */
    protected $discountLabel;

    /**
     * @var InvoiceTax[]
     * @Patch
     */
    protected $taxes;

    /**
     * @return InvoiceTaxCollection
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

    /**
     * @var float
     */
    protected $total;

    /**
     * @var float
     */
    protected $amountPaid;

    /**
     * @var string
     */
    protected $currencyCode;

    /**
     * @var int
     */
    protected $status;

    /**
     * @var PaymentCover[]
     * @Patch
     */
    protected $paymentCovers;

    /**
     * @return PaymentCoverCollection
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

    /**
     * @var bool
     * @Patch
     */
    protected $uncollectible;

}
