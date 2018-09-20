<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;
use MVQN\REST\Annotations\PostAnnotation as Post;
use MVQN\REST\Annotations\PostRequiredAnnotation as PostRequired;
use MVQN\REST\Annotations\PatchAnnotation as Patch;

use UCRM\REST\Endpoints\Helpers\ServiceHelper;

/**
 * Class Service
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/clients/services", "getById": "/clients/services/:id" }
 * @Endpoint { "post": "/clients/:clientId/services" }
 * @Endpoint { "patch": "/clients/services" }
 *
 * @method int|null getServicePlanId()
 * @method Service setServicePlanId(int $id)
 * @method int|null getServicePlanPeriodId()
 * @method Service setServicePlanPeriodId(int $id)
 * @method string|null getActiveFrom()
 * @see    Service::setActiveFrom()
 * @method string|null getActiveTo()
 * @see    Service::setActiveTo()
 * @method string|null getName()
 * @method Service setName(string $name)
 * @method float|null getPrice()
 * @method Service setPrice(float $price)
 * @method string|null getNote()
 * @method Service setNote(string $note)
 * @method string|null getInvoicingStart()
 * @see Service::setInvoicingStart()
 * @method int|null getInvoicingPeriodType()
 * @method Service setInvoicingPeriodType(int $type)
 * @method int|null getInvoicingPeriodStartDay()
 * @method Service setInvoicingPeriodStartDay(int $day)
 * @method int|null getInvoicingDayAdjustment()
 * @method Service setInvoicingDayAdjustment(int $adjustment)
 * @method bool|null getInvoicingProratedSeparately()
 * @method Service setInvoicingProratedSeparately(bool $separate)
 * @method bool|null getInvoicingSeparately()
 * @method Service setInvoicingSeparately(bool $separate)
 * @method bool|null getSendEmailsAutomatically()
 * @method Service setSendEmailsAutomatically(bool $automatic)
 * @method bool|null getUseCreditAutomatically()
 * @method Service setUseCreditAutomatically(bool $automatic)
 * @method string|null getInvoiceLabel()
 * @method Service setInvoiceLabel(string $label)
 * @method string|null getStreet1()
 * @method Service setStreet1(string $street1)
 * @method string|null getStreet2()
 * @method Service setStreet2(string $street2)
 * @method string|null getCity()
 * @method Service setCity(string $city)
 * @method int|null getCountryId()
 * @method Service setCountryId(int $id)
 * @method int|null getStateId()
 * @method Service setStateId(int $id)
 * @method string|null getZipCode()
 * @method Service setZipCode(string $zip)
 * @method float|null getAddressGpsLat()
 * @method Service setAddressGpsLat(float $latitude)
 * @method float|null getAddressGpsLon()
 * @method Service setAddressGpsLon(float $longitude)
 * @method int|null getContractId()
 * @method Service setContractId(int $id)
 * @method int|null getContractLengthType()
 * @method Service setContractLengthType(int $type)
 * @method int|null getMinimumContractLengthMonths()
 * @method Service setMinimumContractLengthMonths(int $months)
 * @method string|null getContractEndDate()
 * @see    Service::setContractEndDate()
 * @method int|null getDiscountType()
 * @method Service setDiscountType(int $type)
 * @method float|null getDiscountValue()
 * @method Service setDiscountValue(float $value)
 * @method string|null getDiscountInvoiceLabel()
 * @method Service setDiscountInvoiceLabel(string $label)
 * @method string|null getDiscountFrom()
 * @see    Service::setDiscountFrom()
 * @method string|null getDiscountTo()
 * @see    Service::setDiscountTo()
 * @method bool|null getTaxable()
 * @method Service setTaxable(bool $taxable)
 * @method int|null getTax1Id()
 * @method Service setTax1Id(int $id)
 * @method int|null getTax2Id()
 * @method Service setTax2Id(int $id)
 * @method int|null getTax3Id()
 * @method Service setTax3Id(int $id)
 * @method int|null getClientId()
 * @method int|null getStatus()
 * @method bool|null getHasIndividualPrice()
 * @method float|null getTotalPrice()
 * @method string|null getServicePlanName()
 * @method float|null getServicePlanPrice()
 * @method int|null getServicePlanPeriod()
 * @method float|null getDownloadSpeed()
 * @method float|null getUploadSpeed()
 * @method string[]|null getIpRanges()
 * @method string|null getCurrencyCode()
 * @method bool|null getHasOutage()
 *
 */
final class Service extends EndpointObject
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
     * @PostRequired
     * @Patch
     */
    protected $servicePlanId;

    /**
     * @var int
     * @PostRequired
     * @Patch
     */
    protected $servicePlanPeriodId;

    /**
     * @var string
     * @Post
     */
    protected $activeFrom;

    /**
     * @param \DateTime $date
     * @return Service
     */
    public function setActiveFrom(\DateTime $date): Service
    {
        $this->activeFrom = $date->format("c");
        return $this;
    }

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $activeTo;

    /**
     * @param \DateTime $date
     * @return Service
     */
    public function setActiveTo(\DateTime $date): Service
    {
        $this->activeTo = $date->format("c");
        return $this;
    }

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $name;

    /**
     * @var float
     * @Post
     * @Patch
     */
    protected $price;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $note;

    /**
     * @var string
     * @Post
     */
    protected $invoicingStart;

    /**
     * @param \DateTime $date
     * @return Service
     */
    public function setInvoicingStart(\DateTime $date): Service
    {
        $this->invoicingStart = $date->format("c");
        return $this;
    }

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $invoicingPeriodType;

    /**
     * @var int
     * @Post
     */
    protected $invoicingPeriodStartDay;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $nextInvoicingDayAdjustment;

    /**
     * @var bool
     * @Post
     */
    protected $invoicingProratedSeparately;

    /**
     * @var bool
     * @Post
     * @Patch
     */
    protected $invoicingSeparately;

    /**
     * @var bool
     * @Post
     * @Patch
     */
    protected $sendEmailsAutomatically;

    /**
     * @var bool
     * @Post
     * @Patch
     */
    protected $useCreditAutomatically;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $invoiceLabel;

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
     * @var float
     * @Post
     * @Patch
     */
    protected $addressGpsLat;

    /**
     * @var float
     * @Post
     * @Patch
     */
    protected $addressGpsLon;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $contractId;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $contractLengthType;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $minimumContractLengthMonths;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $contractEndDate;

    /**
     * @param \DateTime $date
     * @return Service
     */
    public function setContractEndDate(\DateTime $date): Service
    {
        $this->contractEndDate = $date->format("c");
        return $this;
    }

    /**
     * @var int
     * @Post
     */
    protected $discountType;

    /**
     * @var float
     * @Post
     */
    protected $discountValue;

    /**
     * @var string
     * @Post
     */
    protected $discountInvoiceLabel;

    /**
     * @var string
     * @Post
     */
    protected $discountFrom;

    /**
     * @param \DateTime $date
     * @return Service
     */
    public function setDiscountFrom(\DateTime $date): Service
    {
        $this->discountFrom = $date->format("c");
        return $this;
    }

    /**
     * @var string
     * @Post
     */
    protected $discountTo;

    /**
     * @param \DateTime $date
     * @return Service
     */
    public function setDiscountTo(\DateTime $date): Service
    {
        $this->discountTo = $date->format("c");
        return $this;
    }

    /**
     * @var bool
     */
    protected $taxable;

    /**
     * @var int
     * @Post
     */
    protected $tax1Id;

    /**
     * @var int
     * @Post
     */
    protected $tax2Id;

    /**
     * @var int
     * @Post
     */
    protected $tax3Id;

    /**
     * @var int
     */
    protected $clientId;

    /**
     * @var int
     */
    protected $status;

    /**
     * @var bool
     */
    protected $hasIndividualPrice;

    /**
     * @var float
     */
    protected $totalPrice;

    /**
     * @var string
     */
    protected $servicePlanName;

    /**
     * @var float
     */
    protected $servicePlanPrice;

    /**
     * @var int
     */
    protected $servicePlanPeriod;

    /**
     * @var float
     */
    protected $downloadSpeed;

    /**
     * @var float
     */
    protected $uploadSpeed;

    /**
     * @var string[]
     */
    protected $ipRanges;

    /**
     * @var string
     */
    protected $currencyCode;

    /**
     * @var bool
     */
    protected $hasOutage;

}
