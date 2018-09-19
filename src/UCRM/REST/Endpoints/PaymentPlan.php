<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;

use UCRM\REST\Endpoints\Helpers\PaymentPlanHelper;

/**
 * Class PaymentPlan
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/payment-plans", "getById": "/payment-plans/:id" }
 * @Endpoint { "post": "/payment-plans" }
 *
 * @method string|null getName()
 * @method PaymentPlan setName(string $name)
 *
 * @method string|null getStatus()
 * @method PaymentPlan setStatus(string $status)
 *
 * @method string|null getCreatedDate()
 *
 * @method string|null getCanceledDate()
 *
 * @method string|null getNextPaymentDate()
 *
 * @method bool|null getActive()
 * @method PaymentPlan setActive(bool $active)
 *
 * @method string|null getProvider()
 * @method PaymentPlan setProvider(string $provider)
 *
 * @method string|null getProviderPlanId()
 * @method PaymentPlan setProviderPlanId(string $id)
 *
 * @method string|null getProviderSubscriptionId()
 * @method PaymentPlan setProviderSubscriptionId(string $id)
 *
 * @method int|null getClientId()
 * @method PaymentPlan setClientId(int $id)
 *
 * @method int|null getCurrencyId()
 * @method PaymentPlan setCurrencyId(int $id)
 *
 * @method float|null getAmount()
 * @method PaymentPlan setAmount(float $amount)
 *
 * @method int|null getPeriod()
 * @method PaymentPlan setPeriod(int $period)
 *
 * @method string|null getStartDate()
 *
 */
final class PaymentPlan extends EndpointObject
{
    use PaymentPlanHelper;

    // =================================================================================================================
    // ENUMS
    // -----------------------------------------------------------------------------------------------------------------

    public const PROVIDER_IPPAY     = "ippay";

    public const STATUS_CREATED     = "created";
    public const STATUS_PENDING     = "pending";
    public const STATUS_ACTIVE      = "active";
    public const STATUS_CANCELLED   = "cancelled";
    public const STATUS_PAUSED      = "paused";
    public const STATUS_ERROR       = "error";

    public const PERIOD_MONTHS_1    = 1;
    public const PERIOD_MONTHS_3    = 3;
    public const PERIOD_MONTHS_6    = 6;
    public const PERIOD_MONTHS_12   = 12;
    public const PERIOD_MONTHS_24   = 24;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $createdDate;

    /**
     * @param \DateTime $value
     * @return PaymentPlan
     */
    public function setCreatedDate(\DateTime $value): PaymentPlan
    {
        $this->createdDate = $value->format("c");
        return $this;
    }

    /**
     * @var string
     */
    protected $canceledDate;

    /**
     * @param \DateTime $date
     * @return PaymentPlan
     */
    public function setCanceledDate(\DateTime $date): PaymentPlan
    {
        $this->canceledDate = $date->format("c");
        return $this;
    }

    /**
     * @var string
     */
    protected $nextPaymentDate;

    /**
     * @param \DateTime $date
     * @return PaymentPlan
     */
    public function setNextPaymentDate(\DateTime $date): PaymentPlan
    {
        $this->nextPaymentDate = $date->format("c");
        return $this;
    }

    /**
     * @var bool
     */
    protected $active;

    /**
     * @var string
     * @post-required
     */
    protected $provider;

    /**
     * @var string
     * @post
     */
    protected $providerPlanId;

    /**
     * @var string
     * @post
     */
    protected $providerSubscriptionId;

    /**
     * @var int
     * @post-required
     */
    protected $clientId;

    /**
     * @var int
     * @post-required
     */
    protected $currencyId;

    /**
     * @var float
     * @post-required
     */
    protected $amount;

    /**
     * @var int
     * @post-required
     */
    protected $period;

    /**
     * @var string
     * @post
     */
    protected $startDate;

    /**
     * @param \DateTime $value
     * @return PaymentPlan
     */
    public function setStartDate(\DateTime $value): PaymentPlan
    {
        $this->startDate = $value->format("c");
        return $this;
    }

}
