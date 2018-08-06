<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Exceptions\RestClientException;



/**
 * Class Invoice
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class Invoice extends Endpoint
{
    /** @const string  */
    protected const ENDPOINT = "/invoices";



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
    /** @var int  */
    protected $clientId;

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $number;

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $createdDate;

    /**
     * @return string
     */
    public function getCreatedDate(): string
    {
        return $this->createdDate;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $emailSentDate;

    /**
     * @return string
     */
    public function getEmailSentDate(): string
    {
        return $this->emailSentDate;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $maturityDays;

    /**
     * @return int
     */
    public function getMaturityDays(): int
    {
        return $this->maturityDays;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $notes;

    /**
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $adminNotes;

    /**
     * @return string
     */
    public function getAdminNotes(): string
    {
        return $this->adminNotes;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $invoiceTemplateId;

    /**
     * @return int
     */
    public function getInvoiceTemplateId(): int
    {
        return $this->invoiceTemplateId;
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
    /** @var string  */
    protected $organizationRegistrationNumber;

    /**
     * @return string
     */
    public function getOrganizationRegistrationNumber(): string
    {
        return $this->organizationRegistrationNumber;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $organizationTaxId;

    /**
     * @return string
     */
    public function getOrganizationTaxId(): string
    {
        return $this->organizationTaxId;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $organizationStreet1;

    /**
     * @return string
     */
    public function getOrganizationStreet1(): string
    {
        return $this->organizationStreet1;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $organizationStreet2;

    /**
     * @return string
     */
    public function getOrganizationStreet2(): string
    {
        return $this->organizationStreet2;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $organizationCity;

    /**
     * @return string
     */
    public function getOrganizationCity(): string
    {
        return $this->organizationCity;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $organizationCountryId;

    /**
     * @return int
     */
    public function getOrganizationCountryId(): int
    {
        return $this->organizationCountryId;
    }

    /** @var Country $organzationCountry */
    protected $organizationCountry = null;

    /**
     * @return Country
     * @throws RestClientException
     */
    public function getOrganizationCountry(): Country
    {
        // Cache the value here for future lookups...
        if($this->organizationCountry === null)
            $this->organizationCountry = Country::getById($this->organizationCountryId);

        return $this->organizationCountry;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $organizationStateId;

    /**
     * @return int
     */
    public function getOrganizationStateId(): int
    {
        return $this->organizationStateId;
    }

    /** @var State $organizationState */
    protected $organizationState = null;

    /**
     * @return State
     * @throws RestClientException
     */
    public function getOrganizationState(): State
    {
        // Cache the value here for future lookups...
        if($this->organizationState === null)
            $this->organizationState = State::getById($this->organizationStateId);

        return $this->organizationState;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $organizationZipCode;

    /**
     * @return string
     */
    public function getOrganizationZipCode(): string
    {
        return $this->organizationZipCode;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $organizationBankAccountName;

    /**
     * @return string
     */
    public function getOrganizationBankAccountName(): string
    {
        return $this->organizationBankAccountName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $organizationBankAccountField1;

    /**
     * @return string
     */
    public function getOrganizationBankAccountField1(): string
    {
        return $this->organizationBankAccountField1;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $organizationBankAccountField2;

    /**
     * @return string
     */
    public function getOrganizationBankAccountField2(): string
    {
        return $this->organizationBankAccountField2;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $clientFirstName;

    /**
     * @return string
     */
    public function getClientFirstName(): string
    {
        return $this->clientFirstName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $clientLastName;

    /**
     * @return string
     */
    public function getClientLastName(): string
    {
        return $this->clientLastName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $clientCompanyName;

    /**
     * @return string
     */
    public function getClientCompanyName(): string
    {
        return $this->clientCompanyName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $clientCompanyRegistrationNumber;

    /**
     * @return string
     */
    public function getClientCompanyRegistrationNumber(): string
    {
        return $this->clientCompanyRegistrationNumber;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $clientCompanyTaxId;

    /**
     * @return string
     */
    public function getClientCompanyTaxId(): string
    {
        return $this->clientCompanyTaxId;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $clientStreet1;

    /**
     * @return string
     */
    public function getClientStreet1(): string
    {
        return $this->clientStreet1;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $clientStreet2;

    /**
     * @return string
     */
    public function getClientStreet2(): string
    {
        return $this->clientStreet2;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $clientCity;

    /**
     * @return string
     */
    public function getClientCity(): string
    {
        return $this->clientCity;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $clientCountryId;

    /**
     * @return int
     */
    public function getClientCountryId(): int
    {
        return $this->clientCountryId;
    }

    /** @var Country $clientCountry */
    protected $clientCountry = null;

    /**
     * @return Country
     * @throws RestClientException
     */
    public function getClientCountry(): Country
    {
        // Cache the value here for future lookups...
        if($this->clientCountry === null)
            $this->clientCountry = Country::getById($this->clientCountryId);

        return $this->clientCountry;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $clientStateId;

    /**
     * @return int
     */
    public function getClientStateId(): int
    {
        return $this->clientStateId;
    }

    /** @var State $clientState */
    protected $clientState = null;

    /**
     * @return State
     * @throws RestClientException
     */
    public function getClientState(): State
    {
        // Cache the value here for future lookups...
        if($this->clientState === null)
            $this->clientState = State::getById($this->clientStateId);

        return $this->clientState;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $clientZipCode;

    /**
     * @return string
     */
    public function getClientZipCode(): string
    {
        return $this->clientZipCode;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $dueDate;

    /**
     * @return string
     */
    public function getDueDate(): string
    {
        return $this->dueDate;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var InvoiceItem[]  */
    protected $items;

    /**
     * @return InvoiceItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var float  */
    protected $subtotal;

    /**
     * @return float
     */
    public function getSubtotal(): float
    {
        return $this->subtotal;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var float  */
    protected $discount;

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $discountLabel;

    /**
     * @return string
     */
    public function getDiscountLabel(): string
    {
        return $this->discountLabel;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var InvoiceTax[]  */
    protected $taxes;

    /**
     * @return InvoiceTax[]
     */
    public function getTaxes(): array
    {
        return $this->taxes;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var float  */
    protected $total;

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var float  */
    protected $amountPaid;

    /**
     * @return float
     */
    public function getAmountPaid(): float
    {
        return $this->amountPaid;
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
    /** @var float  */
    protected $status;

    /**
     * @return float
     */
    public function getStatus(): float
    {
        return $this->status;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var PaymentCover[]  */
    protected $paymentCovers;

    /**
     * @return PaymentCover[]
     */
    public function getPaymentCovers(): array
    {
        return $this->paymentCovers;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    protected $uncollectible;

    /**
     * @return bool
     */
    public function getUncollectible(): bool
    {
        return $this->uncollectible;
    }

}



