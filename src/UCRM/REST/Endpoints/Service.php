<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;



/**
 * Class Service
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/clients/services", "getById": "/clients/services/:id" }
 */
final class Service extends Endpoint
{
    /** @const string  */
    //protected const ENDPOINT = "/clients/services";

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

    /** @var Client $client */
    protected $client = null;

    /**
     * @return Client
     * @throws RestClientException
     */
    public function getClient(): Client
    {
        // Cache the value here for future lookups...
        if($this->client === null)
            $this->client = Client::getById($this->clientId);

        return $this->client;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $status;

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $servicePlanId;

    /**
     * @return int
     */
    public function getServicePlanId(): int
    {
        return $this->servicePlanId;
    }

    /** @var ServicePlan $servicePlan */
    protected $servicePlan = null;

    /**
     * @return ServicePlan
     * @throws RestClientException
     */
    public function getServicePlan(): ServicePlan
    {
        // Cache the value here for future lookups...
        if($this->servicePlan === null)
            $this->servicePlan = ServicePlan::getById($this->servicePlanId);

        return $this->servicePlan;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $servicePlanPeriodId;

    /**
     * @return int
     */
    public function getServicePlanPeriodId(): int
    {
        return $this->servicePlanPeriodId;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $activeFrom;

    /**
     * @return string
     */
    public function getActiveFrom(): string
    {
        return $this->activeFrom;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $activeTo;

    /**
     * @return string
     */
    public function getActiveTo(): string
    {
        return $this->activeTo;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var float  */
    protected $price;

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
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
    protected $invoicingStart;

    /**
     * @return string
     */
    public function getInvoicingStart(): string
    {
        return $this->invoicingStart;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $invoicingPeriodType;

    /**
     * @return string
     */
    public function getInvoicingPeriodType(): string
    {
        return $this->invoicingPeriodType;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $invoicingPeriodStartDay;

    /**
     * @return int
     */
    public function getInvoicingPeriodStartDay(): int
    {
        return $this->invoicingPeriodStartDay;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $nextInvoicingDayAdjustment;

    /**
     * @return int
     */
    public function getNextInvoicingDayAdjustment(): int
    {
        return $this->nextInvoicingDayAdjustment;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    protected $invoicingProratedSeparately;

    /**
     * @return bool
     */
    public function getInvoicingProratedSeparately(): bool
    {
        return $this->invoicingProratedSeparately;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    protected $invoicingSeparately;

    /**
     * @return bool
     */
    public function getInvoicingSeparately(): bool
    {
        return $this->invoicingSeparately;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    protected $sendEmailsAutomatically;

    /**
     * @return bool
     */
    public function getSendEmailsAutomatically(): bool
    {
        return $this->sendEmailsAutomatically;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    protected $useCreditAutomatically;

    /**
     * @return bool
     */
    public function getUseCreditAutomatically(): bool
    {
        return $this->useCreditAutomatically;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $invoiceLabel;

    /**
     * @return string
     */
    public function getInvoiceLabel(): string
    {
        return $this->invoiceLabel;
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
     * @throws RestClientException
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
     * @throws RestClientException
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
    /** @var float  */
    protected $addressGpsLat;

    /**
     * @return float
     */
    public function getAddressGpsLat(): float
    {
        return $this->addressGpsLat;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var float  */
    protected $addressGpsLon;

    /**
     * @return float
     */
    public function getAddressGpsLon(): float
    {
        return $this->addressGpsLon;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $contractId;

    /**
     * @return string
     */
    public function getContractId(): string
    {
        return $this->contractId;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $contractLengthType;

    /**
     * @return int
     */
    public function getContractLengthType(): int
    {
        return $this->contractLengthType;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $minimumContractLengthMonths;

    /**
     * @return int
     */
    public function getMinimumContractLengthMonths(): int
    {
        return $this->minimumContractLengthMonths;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $contractEndDate;

    /**
     * @return string
     */
    public function getContractEndDate(): string
    {
        return $this->contractEndDate;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $discountType;

    /**
     * @return int
     */
    public function getDiscountType(): int
    {
        return $this->discountType;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var float  */
    protected $discountValue;

    /**
     * @return float
     */
    public function getDiscountValue(): float
    {
        return $this->discountValue;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $discountInvoiceLabel;

    /**
     * @return string
     */
    public function getDiscountInvoiceLabel(): string
    {
        return $this->discountInvoiceLabel;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $discountFrom;

    /**
     * @return string
     */
    public function getDiscountFrom(): string
    {
        return $this->discountFrom;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $discountTo;

    /**
     * @return string
     */
    public function getDiscountTo(): string
    {
        return $this->discountTo;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    protected $taxable;

    /**
     * @return bool
     */
    public function getTaxable(): bool
    {
        return $this->taxable;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $tax1Id;

    /**
     * @return int
     */
    public function getTax1Id(): int
    {
        return $this->tax1Id;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $tax2Id;

    /**
     * @return int
     */
    public function getTax2Id(): int
    {
        return $this->tax2Id;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $tax3Id;

    /**
     * @return int
     */
    public function getTax3Id(): int
    {
        return $this->tax3Id;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    protected $hasIndividualPrice;

    /**
     * @return bool
     */
    public function getHasIndividualPrice(): bool
    {
        return $this->hasIndividualPrice;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var float  */
    protected $totalPrice;

    /**
     * @return float
     */
    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $servicePlanName;

    /**
     * @return string
     */
    public function getServicePlanName(): string
    {
        return $this->servicePlanName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var float  */
    protected $servicePlanPrice;

    /**
     * @return float
     */
    public function getServicePlanPrice(): float
    {
        return $this->servicePlanPrice;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $servicePlanPeriod;

    /**
     * @return int
     */
    public function getServicePlanPeriod(): int
    {
        return $this->servicePlanPeriod;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $downloadSpeed;

    /**
     * @return int
     */
    public function getDownloadSpeed(): int
    {
        return $this->downloadSpeed;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $uploadSpeed;

    /**
     * @return int
     */
    public function getUploadSpeed(): int
    {
        return $this->uploadSpeed;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string[]  */
    protected $ipRanges;

    /**
     * @return string[]
     */
    public function getIpRanges(): array
    {
        return $this->ipRanges;
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
    /** @var bool  */
    protected $hasOutage;

    /**
     * @return bool
     */
    public function getHasOutage(): bool
    {
        return $this->hasOutage;
    }

}



