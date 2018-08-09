<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Exceptions\RestClientException;



/**
 * Class Refund
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/refunds", "getById": "/refunds/:id" }
 */
final class Refund extends Endpoint
{
    /** @const string  */
    //protected const ENDPOINT = "/refunds";



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
    protected $note;

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
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
    protected $currencyCode;

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
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

}



