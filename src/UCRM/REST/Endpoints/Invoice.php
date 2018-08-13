<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\Collections\Exceptions\CollectionException;
use UCRM\REST\Endpoints\Collections\InvoiceItemCollection;
use UCRM\REST\Endpoints\Collections\InvoiceTaxCollection;
use UCRM\REST\Endpoints\Collections\PaymentCoverCollection;
use UCRM\REST\Endpoints\Lookups\InvoiceItem;
use UCRM\REST\Endpoints\Lookups\InvoiceTax;

/**
 * Class Invoice
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/invoices", "getById": "/invoices/:id" }
 */
final class Invoice extends Endpoint
{

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



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $number;

    /**
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $createdDate;

    /**
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $emailSentDate;

    /**
     * @return string|null
     */
    public function getEmailSentDate(): ?string
    {
        return $this->emailSentDate;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $maturityDays;

    /**
     * @return int|null
     */
    public function getMaturityDays(): ?int
    {
        return $this->maturityDays;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $notes;

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $adminNotes;

    /**
     * @return string|null
     */
    public function getAdminNotes(): ?string
    {
        return $this->adminNotes;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $invoiceTemplateId;

    /**
     * @return int|null
     */
    public function getInvoiceTemplateId(): ?int
    {
        return $this->invoiceTemplateId;
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
     * @var string
     */
    protected $organizationRegistrationNumber;

    /**
     * @return string|null
     */
    public function getOrganizationRegistrationNumber(): ?string
    {
        return $this->organizationRegistrationNumber;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $organizationTaxId;

    /**
     * @return string|null
     */
    public function getOrganizationTaxId(): ?string
    {
        return $this->organizationTaxId;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $organizationStreet1;

    /**
     * @return string|null
     */
    public function getOrganizationStreet1(): ?string
    {
        return $this->organizationStreet1;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $organizationStreet2;

    /**
     * @return string|null
     */
    public function getOrganizationStreet2(): ?string
    {
        return $this->organizationStreet2;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $organizationCity;

    /**
     * @return string|null
     */
    public function getOrganizationCity(): ?string
    {
        return $this->organizationCity;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $organizationCountryId;

    /**
     * @return int|null
     */
    public function getOrganizationCountryId(): ?int
    {
        return $this->organizationCountryId;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $organizationStateId;

    /**
     * @return int|null
     */
    public function getOrganizationStateId(): ?int
    {
        return $this->organizationStateId;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $organizationZipCode;

    /**
     * @return string|null
     */
    public function getOrganizationZipCode(): ?string
    {
        return $this->organizationZipCode;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $organizationBankAccountName;

    /**
     * @return string|null
     */
    public function getOrganizationBankAccountName(): ?string
    {
        return $this->organizationBankAccountName;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $organizationBankAccountField1;

    /**
     * @return string|null
     */
    public function getOrganizationBankAccountField1(): ?string
    {
        return $this->organizationBankAccountField1;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $organizationBankAccountField2;

    /**
     * @return string|null
     */
    public function getOrganizationBankAccountField2(): ?string
    {
        return $this->organizationBankAccountField2;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $clientFirstName;

    /**
     * @return string|null
     */
    public function getClientFirstName(): ?string
    {
        return $this->clientFirstName;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $clientLastName;

    /**
     * @return string|null
     */
    public function getClientLastName(): ?string
    {
        return $this->clientLastName;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $clientCompanyName;

    /**
     * @return string|null
     */
    public function getClientCompanyName(): ?string
    {
        return $this->clientCompanyName;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $clientCompanyRegistrationNumber;

    /**
     * @return string|null
     */
    public function getClientCompanyRegistrationNumber(): ?string
    {
        return $this->clientCompanyRegistrationNumber;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $clientCompanyTaxId;

    /**
     * @return string|null
     */
    public function getClientCompanyTaxId(): ?string
    {
        return $this->clientCompanyTaxId;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $clientStreet1;

    /**
     * @return string|null
     */
    public function getClientStreet1(): ?string
    {
        return $this->clientStreet1;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $clientStreet2;

    /**
     * @return string|null
     */
    public function getClientStreet2(): ?string
    {
        return $this->clientStreet2;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $clientCity;

    /**
     * @return string|null
     */
    public function getClientCity(): ?string
    {
        return $this->clientCity;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $clientCountryId;

    /**
     * @return int|null
     */
    public function getClientCountryId(): ?int
    {
        return $this->clientCountryId;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $clientStateId;

    /**
     * @return int|null
     */
    public function getClientStateId(): ?int
    {
        return $this->clientStateId;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $clientZipCode;

    /**
     * @return string|null
     */
    public function getClientZipCode(): ?string
    {
        return $this->clientZipCode;
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



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var InvoiceItem[]
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



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var InvoiceTax[]
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
     * @var float
     */
    protected $status;

    /**
     * @return float|null
     */
    public function getStatus(): ?float
    {
        return $this->status;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var PaymentCover[]
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



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     */
    protected $uncollectible;

    /**
     * @return bool|null
     */
    public function getUncollectible(): ?bool
    {
        return $this->uncollectible;
    }

}



