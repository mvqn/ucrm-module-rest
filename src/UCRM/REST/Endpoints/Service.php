<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Helpers\ServiceHelper;

/**
 * Class Service
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/clients/services", "getById": "/clients/services/:id" }
 * @endpoints { "post": "/clients/:clientId/services" }
 * @endpoints { "patch": "/clients/services" }
 */
final class Service extends Endpoint
{
    use ServiceHelper;

    // =================================================================================================================
    // ENUMS
    // -----------------------------------------------------------------------------------------------------------------

    public const INVOICING_PERIOD_TYPE_BACKWARD     = 1;
    public const INVOICING_PERIOD_TYPE_FORWARD      = 2;

    public const CONTRACT_LENGTH_TYPE_OPEN_ENDED    = 1;
    public const CONTRACT_LENGTH_TYPE_CLOSE_ENDED   = 2;

    public const DISCOUNT_TYPE_NONE                 = 0;
    public const DISCOUNT_TYPE_PERCENTAGE           = 1;
    public const DISCOUNT_TYPE_FIXED                = 2;

    public const STATUS_PREPARED                    = 0;
    public const STATUS_ACTIVE                      = 1;
    public const STATUS_ENDED                       = 2;
    public const STATUS_SUSPENDED                   = 3;
    public const STATUS_PREPARED_BLOCKED            = 4;
    public const STATUS_OBSOLETE                    = 5;
    public const STATUS_DEFERRED                    = 6;
    public const STATUS_QUOTED                      = 7;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post-required
     * @patch
     */
    protected $servicePlanId;

    /**
     * @return int|null
     */
    public function getServicePlanId(): ?int
    {
        return $this->servicePlanId;
    }

    /**
     * @param int $value
     * @return Service
     */
    public function setServicePlanId(int $value): Service
    {
        $this->servicePlanId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post-required
     * @patch
     */
    protected $servicePlanPeriodId;

    /**
     * @return int|null
     */
    public function getServicePlanPeriodId(): ?int
    {
        return $this->servicePlanPeriodId;
    }

    /**
     * @param int $value
     * @return Service
     */
    public function setServicePlanPeriodId(int $value): Service
    {
        $this->servicePlanPeriodId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     */
    protected $activeFrom;

    /**
     * @return string|null
     */
    public function getActiveFrom(): ?string
    {
        return $this->activeFrom;
    }

    /**
     * @param \DateTime $value
     * @return Service
     */
    public function setActiveFrom(\DateTime $value): Service
    {
        $this->activeFrom = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $activeTo;

    /**
     * @return string|null
     */
    public function getActiveTo(): ?string
    {
        return $this->activeTo;
    }

    /**
     * @param \DateTime $value
     * @return Service
     */
    public function setActiveTo(\DateTime $value): Service
    {
        $this->activeTo = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $name;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $value
     * @return Service
     */
    public function setName(string $value): Service
    {
        $this->name = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     * @post
     * @patch
     */
    protected $price;

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float $value
     * @return Service
     */
    public function setPrice(float $value): Service
    {
        $this->price = $value;
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
     * @return Service
     */
    public function setNote(string $value): Service
    {
        $this->note = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     */
    protected $invoicingStart;

    /**
     * @return string|null
     */
    public function getInvoicingStart(): ?string
    {
        return $this->invoicingStart;
    }

    /**
     * @param \DateTime $value
     * @return Service
     */
    public function setInvoicingStart(\DateTime $value): Service
    {
        $this->invoicingStart = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $invoicingPeriodType;

    /**
     * @return int|null
     */
    public function getInvoicingPeriodType(): ?int
    {
        return $this->invoicingPeriodType;
    }

    /**
     * @param int $value
     * @return Service
     */
    public function setInvoicingPeriodType(int $value): Service
    {
        $this->invoicingPeriodType = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     */
    protected $invoicingPeriodStartDay;

    /**
     * @return int|null
     */
    public function getInvoicingPeriodStartDay(): ?int
    {
        return $this->invoicingPeriodStartDay;
    }

    /**
     * @param int $value
     * @return Service
     */
    public function setInvoicingPeriodStartDay(int $value): Service
    {
        $this->invoicingPeriodStartDay = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $nextInvoicingDayAdjustment;

    /**
     * @return int|null
     */
    public function getNextInvoicingDayAdjustment(): ?int
    {
        return $this->nextInvoicingDayAdjustment;
    }

    /**
     * @param int $value
     * @return Service
     */
    public function setNextInvoicingDayAdjustment(int $value): Service
    {
        $this->nextInvoicingDayAdjustment = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     * @post
     */
    protected $invoicingProratedSeparately;

    /**
     * @return bool|null
     */
    public function getInvoicingProratedSeparately(): ?bool
    {
        return $this->invoicingProratedSeparately;
    }

    /**
     * @param bool $value
     * @return Service
     */
    public function setInvoicingProratedSeparately(bool $value): Service
    {
        $this->invoicingProratedSeparately = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var bool
     * @post
     * @patch
     */
    protected $invoicingSeparately;

    /**
     * @return bool|null
     */
    public function getInvoicingSeparately(): ?bool
    {
        return $this->invoicingSeparately;
    }

    /**
     * @param bool $value
     * @return Service
     */
    public function setInvoicingSeparately(bool $value): Service
    {
        $this->invoicingSeparately = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     * @post
     * @patch
     */
    protected $sendEmailsAutomatically;

    /**
     * @return bool|null
     */
    public function getSendEmailsAutomatically(): ?bool
    {
        return $this->sendEmailsAutomatically;
    }

    /**
     * @param bool $value
     * @return Service
     */
    public function setSendEmailsAutomatically(bool $value): Service
    {
        $this->sendEmailsAutomatically = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     * @post
     * @patch
     */
    protected $useCreditAutomatically;

    /**
     * @return bool|null
     */
    public function getUseCreditAutomatically(): ?bool
    {
        return $this->useCreditAutomatically;
    }

    /**
     * @param bool $value
     * @return Service
     */
    public function setUseCreditAutomatically(bool $value): Service
    {
        $this->useCreditAutomatically = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $invoiceLabel;

    /**
     * @return string|null
     */
    public function getInvoiceLabel(): ?string
    {
        return $this->invoiceLabel;
    }

    /**
     * @param string $value
     * @return Service
     */
    public function setInvoiceLabel(string $value): Service
    {
        $this->invoiceLabel = $value;
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
     * @return Service
     */
    public function setStreet1(string $value): Service
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
     * @return Service
     */
    public function setStreet2(string $value): Service
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
     * @return Service
     */
    public function setCity(string $value): Service
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
     * @return Service
     */
    public function setCountryId(int $value): Service
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
     * @return Service
     */
    public function setStateId(int $value): Service
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
     * @return Service
     */
    public function setZipCode(string $value): Service
    {
        $this->zipCode = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     * @post
     * @patch
     */
    protected $addressGpsLat;

    /**
     * @return float|null
     */
    public function getAddressGpsLat(): ?float
    {
        return $this->addressGpsLat;
    }

    /**
     * @param float $value
     * @return Service
     */
    public function setAddressGpsLat(float $value): Service
    {
        $this->addressGpsLat = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     * @post
     * @patch
     */
    protected $addressGpsLon;

    /**
     * @return float|null
     */
    public function getAddressGpsLon(): ?float
    {
        return $this->addressGpsLon;
    }

    /**
     * @param float $value
     * @return Service
     */
    public function setAddressGpsLon(float $value): Service
    {
        $this->addressGpsLon = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $contractId;

    /**
     * @return string|null
     */
    public function getContractId(): ?string
    {
        return $this->contractId;
    }

    /**
     * @param string $value
     * @return Service
     */
    public function setContractId(string $value): Service
    {
        $this->contractId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $contractLengthType;

    /**
     * @return int|null
     */
    public function getContractLengthType(): ?int
    {
        return $this->contractLengthType;
    }

    /**
     * @param int $value
     * @return Service
     */
    public function setContractLengthType(int $value): Service
    {
        $this->contractLengthType = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $minimumContractLengthMonths;

    /**
     * @return int|null
     */
    public function getMinimumContractLengthMonths(): ?int
    {
        return $this->minimumContractLengthMonths;
    }

    /**
     * @param int $value
     * @return Service
     */
    public function setMinimumContractLengthMonths(int $value): Service
    {
        $this->minimumContractLengthMonths = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $contractEndDate;

    /**
     * @return string|null
     */
    public function getContractEndDate(): ?string
    {
        return $this->contractEndDate;
    }

    /**
     * @param \DateTime $value
     * @return Service
     */
    public function setContractEndDate(\DateTime $value): Service
    {
        $this->contractEndDate = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     */
    protected $discountType;

    /**
     * @return int|null
     */
    public function getDiscountType(): ?int
    {
        return $this->discountType;
    }

    /**
     * @param int $value
     * @return Service
     */
    public function setDiscountType(int $value): Service
    {
        $this->discountType = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     * @post
     */
    protected $discountValue;

    /**
     * @return float|null
     */
    public function getDiscountValue(): ?float
    {
        return $this->discountValue;
    }

    /**
     * @param float $value
     * @return Service
     */
    public function setDiscountValue(float $value): Service
    {
        $this->discountValue = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     */
    protected $discountInvoiceLabel;

    /**
     * @return string|null
     */
    public function getDiscountInvoiceLabel(): ?string
    {
        return $this->discountInvoiceLabel;
    }

    /**
     * @param string $value
     * @return Service
     */
    public function setDiscountInvoiceLabel(string $value): Service
    {
        $this->discountInvoiceLabel = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     */
    protected $discountFrom;

    /**
     * @return string|null
     */
    public function getDiscountFrom(): ?string
    {
        return $this->discountFrom;
    }

    /**
     * @param \DateTime $value
     * @return Service
     */
    public function setDiscountFrom(\DateTime $value): Service
    {
        $this->discountFrom = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     */
    protected $discountTo;

    /**
     * @return string|null
     */
    public function getDiscountTo(): ?string
    {
        return $this->discountTo;
    }

    /**
     * @param \DateTime $value
     * @return Service
     */
    public function setDiscountTo(\DateTime $value): Service
    {
        $this->discountTo = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     */
    protected $taxable;

    /**
     * @return bool|null
     */
    public function getTaxable(): ?bool
    {
        return $this->taxable;
    }

    /**
     * @param bool $value
     * @return Service
     */
    public function setTaxable(bool $value): Service
    {
        $this->taxable = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
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
     * @return Service
     */
    public function setTax1Id(int $value): Service
    {
        $this->tax1Id = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
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
     * @return Service
     */
    public function setTax2Id(int $value): Service
    {
        $this->tax2Id = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
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
     * @return Service
     */
    public function setTax3Id(int $value): Service
    {
        $this->tax3Id = $value;
        return $this;
    }

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
     * @return Service
     */
    public function setClientId(int $value): Service
    {
        $this->clientId = $value;
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
     * @return Service
     */
    public function setStatus(int $value): Service
    {
        $this->status = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     */
    protected $hasIndividualPrice;

    /**
     * @return bool|null
     */
    public function getHasIndividualPrice(): ?bool
    {
        return $this->hasIndividualPrice;
    }

    /**
     * @param bool $value
     * @return Service
     */
    public function setHasIndividualPrice(bool $value): Service
    {
        $this->hasIndividualPrice = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     */
    protected $totalPrice;

    /**
     * @return float|null
     */
    public function getTotalPrice(): ?float
    {
        return $this->totalPrice;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $servicePlanName;

    /**
     * @return string|null
     */
    public function getServicePlanName(): ?string
    {
        return $this->servicePlanName;
    }

    /**
     * @param string $value
     * @return Service
     */
    public function setServicePlanName(string $value): Service
    {
        $this->servicePlanName = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     */
    protected $servicePlanPrice;

    /**
     * @return float|null
     */
    public function getServicePlanPrice(): ?float
    {
        return $this->servicePlanPrice;
    }

    /**
     * @param float $value
     * @return Service
     */
    public function setServicePlanPrice(float $value): Service
    {
        $this->servicePlanPrice = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $servicePlanPeriod;

    /**
     * @return int|null
     */
    public function getServicePlanPeriod(): ?int
    {
        return $this->servicePlanPeriod;
    }

    /**
     * @param int $value
     * @return Service
     */
    public function setServicePlanPeriod(int $value): Service
    {
        $this->servicePlanPeriod = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     */
    protected $downloadSpeed;

    /**
     * @return float|null
     */
    public function getDownloadSpeed(): ?float
    {
        return $this->downloadSpeed;
    }

    /**
     * @param float $value
     * @return Service
     */
    public function setDownloadSpeed(float $value): Service
    {
        $this->downloadSpeed = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     */
    protected $uploadSpeed;

    /**
     * @return float|null
     */
    public function getUploadSpeed(): ?float
    {
        return $this->uploadSpeed;
    }

    /**
     * @param float $value
     * @return Service
     */
    public function setUploadSpeed(float $value): Service
    {
        $this->uploadSpeed = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string[]
     */
    protected $ipRanges;

    /**
     * @return string[]|null
     */
    public function getIpRanges(): ?array
    {
        return $this->ipRanges;
    }

    /**
     * @param string[] $value
     * @return Service
     */
    public function setIpRanges(array $value): Service
    {
        $this->ipRanges = $value;
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
     * @return Service
     */
    public function setCurrencyCode(string $value): Service
    {
        $this->currencyCode = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     */
    protected $hasOutage;

    /**
     * @return bool|null
     */
    public function getHasOutage(): ?bool
    {
        return $this->hasOutage;
    }

    /**
     * @param bool $value
     * @return Service
     */
    public function setHasOutage(bool $value): Service
    {
        $this->hasOutage = $value;
        return $this;
    }

}
