<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Exceptions\RestClientException;



/**
 * Class Payment
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/payments", "getById": "/payments/:id" }
 */
final class Payment extends Endpoint
{
    /** @const string  */
    //protected const ENDPOINT = "/payments";



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
    /** @var string  */
    protected $method;

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $checkNumber;

    /**
     * @return string
     */
    public function getCheckNumber(): string
    {
        return $this->checkNumber;
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
    /** @var float  */
    protected $amount;

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
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
    protected $receiptSentDate;

    /**
     * @return string
     */
    public function getReceiptSentDate(): string
    {
        return $this->receiptSentDate;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $providerName;

    /**
     * @return string
     */
    public function getProviderName(): string
    {
        return $this->providerName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $providerPaymentId;

    /**
     * @return string
     */
    public function getProviderPaymentId(): string
    {
        return $this->providerPaymentId;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $providerPaymentTime;

    /**
     * @return string
     */
    public function getProviderPaymentTime(): string
    {
        return $this->providerPaymentTime;
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
    /** @var float  */
    protected $creditAmount;

    /**
     * @return float
     */
    public function getCreditAmount(): float
    {
        return $this->creditAmount;
    }

}



