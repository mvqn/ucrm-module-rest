<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;



use UCRM\REST\Endpoints\Helpers\PaymentPlanHelper;

/**
 * Class PaymentPlan
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/payment-plans", "getById": "/payment-plans/:id" }
 * @endpoints { "post": "/payment-plans" }
 */
final class PaymentPlan extends Endpoint
{
    use PaymentPlanHelper;

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

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
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
     * @return PaymentPlan
     */
    public function setName(string $value): PaymentPlan
    {
        $this->name = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $status;

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $value
     * @return PaymentPlan
     */
    public function setStatus(string $value): PaymentPlan
    {
        $this->status = $value;
        return $this;
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

    /**
     * @param \DateTime $value
     * @return PaymentPlan
     */
    public function setCreatedDate(\DateTime $value): PaymentPlan
    {
        $this->createdDate = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $canceledDate;

    /**
     * @return string|null
     */
    public function getCanceledDate(): ?string
    {
        return $this->canceledDate;
    }

    /**
     * @param \DateTime $value
     * @return PaymentPlan
     */
    public function setCanceledDate(\DateTime $value): PaymentPlan
    {
        $this->canceledDate = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $nextPaymentDate;

    /**
     * @return string|null
     */
    public function getNextPaymentDate(): ?string
    {
        return $this->nextPaymentDate;
    }

    /**
     * @param \DateTime $value
     * @return PaymentPlan
     */
    public function setNextPaymentDate(\DateTime $value): PaymentPlan
    {
        $this->nextPaymentDate = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     */
    protected $active;

    /**
     * @return bool|null
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool $value
     * @return PaymentPlan
     */
    public function setActive(bool $value): PaymentPlan
    {
        $this->active = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post-required
     */
    protected $provider;

    /**
     * @return string|null
     */
    public function getProvider(): ?string
    {
        return $this->provider;
    }

    /**
     * @param string $value
     * @return PaymentPlan
     */
    public function setProvider(string $value): PaymentPlan
    {
        $this->provider = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     */
    protected $providerPlanId;

    /**
     * @return string|null
     */
    public function getProviderPlanId(): ?string
    {
        return $this->providerPlanId;
    }

    /**
     * @param string $value
     * @return PaymentPlan
     */
    public function setProviderPlanId(string $value): PaymentPlan
    {
        $this->providerPlanId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     */
    protected $providerSubscriptionId;

    /**
     * @return string|null
     */
    public function getProviderSubscriptionId(): ?string
    {
        return $this->providerSubscriptionId;
    }

    /**
     * @param string $value
     * @return PaymentPlan
     */
    public function setProviderSubscriptionId(string $value): PaymentPlan
    {
        $this->providerSubscriptionId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post-required
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
     * @return PaymentPlan
     */
    public function setClientId(int $value): PaymentPlan
    {
        $this->clientId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post-required
     */
    protected $currencyId;

    /**
     * @return int|null
     */
    public function getCurrencyId(): ?int
    {
        return $this->currencyId;
    }

    /**
     * @param int $value
     * @return PaymentPlan
     */
    public function setCurrencyId(int $value): PaymentPlan
    {
        $this->currencyId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var float
     * @post-required
     */
    protected $amount;

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float $value
     * @return PaymentPlan
     */
    public function setAmount(float $value): PaymentPlan
    {
        $this->amount = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post-required
     */
    protected $period;

    /**
     * @return int|null
     */
    public function getPeriod(): ?int
    {
        return $this->period;
    }

    /**
     * @param int $value
     * @return PaymentPlan
     */
    public function setPeriod(int $value): PaymentPlan
    {
        $this->period = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     */
    protected $startDate;

    /**
     * @return string|null
     */
    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

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



