<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Exceptions\RestClientException;


/**
 * Class PaymentPlan
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/payment-plans", "getById": "/payment-plans/:id" }
 */
final class PaymentPlan extends Endpoint
{
    /** @const string  */
    //protected const ENDPOINT = "/payment-plans";

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @key
     */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @enum(["created", "pending", "active", "cancelled", "paused", "error"])
     */
    protected $status;

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $createdDate;

    /**
     * @return string
     */
    public function getCreatedDate(): string
    {
        return $this->createdDate;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $canceledDate;

    /**
     * @return string
     */
    public function getCanceledDate(): string
    {
        return $this->canceledDate;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $nextPaymentDate;

    /**
     * @return string
     */
    public function getGetNextPaymentDate(): string
    {
        return $this->nextPaymentDate;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var bool
     */
    protected $active;

    /**
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->active;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @enum(["ippay"])
     * @required
     */
    protected $provider;

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $providerPlanId;

    /**
     * @return string
     */
    public function getProviderPlanId(): string
    {
        return $this->providerPlanId;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $providerSubscriptionId;

    /**
     * @return string
     */
    public function getProviderSubscriptionId(): string
    {
        return $this->providerSubscriptionId;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @required
     */
    protected $clientId;

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @var Client $client
     */
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
    /**
     * @var int
     * @required
     */
    protected $currencyId;

    /**
     * @return int
     */
    public function getCurrencyId(): int
    {
        return $this->currencyId;
    }

    /**
     * @var Currency $currency
     */
    protected $currency = null;

    /**
     * @return Currency
     * @throws RestClientException
     */
    public function getCurrency(): Currency
    {
        // Cache the value here for future lookups...
        if($this->currency === null)
            $this->currency = Currency::getById($this->currencyId);

        return $this->currency;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var float
     * @required
     */
    protected $amount;

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @enum([1, 3, 6, 12, 24])
     * @required
     */
    protected $period;

    /**
     * @return int
     */
    public function getPeriod(): int
    {
        return $this->period;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $startDate;

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

}



