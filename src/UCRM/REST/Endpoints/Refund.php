<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Helpers\RefundHelper;
use UCRM\REST\Endpoints\Lookups\PaymentCover;

/**
 * Class Refund
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/refunds", "getById": "/refunds/:id" }
 * @endpoints { "post": "/refunds" }
 */
final class Refund extends Endpoint
{
    use RefundHelper;

    // =================================================================================================================
    // ENUMS
    // -----------------------------------------------------------------------------------------------------------------

    public const METHOD_CHECK                       = 1;
    public const METHOD_CASH                        = 2;
    public const METHOD_BANK_TRANSFER               = 3;
    public const METHOD_PAYPAL                      = 4;
    public const METHOD_PAYPAL_CREDIT_CARD          = 5;
    public const METHOD_STRIPE_CREDIT_CARD          = 6;
    public const METHOD_STRIPE_SUBSCRIPTION         = 7;
    public const METHOD_PAYPAL_SUBSCRIPTION         = 8;
    public const METHOD_AUTHORIZENET_CREDIT_CARD    = 9;
    public const METHOD_AUTHORIZENET_SUBSCRIPTION   = 10;
    //public const METHOD_COURTESY_CREDIT           = 11; // NOT APPLICABLE TO REFUND!
    public const METHOD_IPPAY                       = 12;
    public const METHOD_IPPAY_SUBSCRIPTION          = 13;
    public const METHOD_MERCADOPAGO                 = 14;
    public const METHOD_MERCADOPAGO_SUBSCRIPTION    = 15;
    public const METHOD_STRIPE_ACH                  = 16;
    public const METHOD_STRIPE_ACH_SUBSCRIPTION     = 17;

    public const METHOD_CUSTOM                      = 99;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post-required
     */
    protected $method;

    /**
     * @return int|null
     */
    public function getMethod(): ?int
    {
        return $this->method;
    }

    /**
     * @param int $value
     * @return Refund
     */
    public function setMethod(int $value): Refund
    {
        $this->method = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     */
    protected $createdDate;

    /**
     * @return string|null
     */
    public function getCreatedDate(): string
    {
        return $this->createdDate;
    }

    /**
     * @param \DateTime $value
     * @return Refund
     */
    public function setCreatedDate(\DateTime $value): Refund
    {
        $this->createdDate = $value->format("c");
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
     * @return Refund
     */
    public function setAmount(float $value): Refund
    {
        $this->amount = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
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
     * @return Refund
     */
    public function setNote(string $value): Refund
    {
        $this->note = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
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
     * @return Refund
     */
    public function setClientId(int $value): Refund
    {
        $this->clientId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
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
     * @return Refund
     */
    public function setCurrencyCode(string $value): Refund
    {
        $this->currencyCode = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var PaymentCover[]
     * @post
     */
    protected $paymentCovers;

    /**
     * @return PaymentCover[]|null
     */
    public function getPaymentCovers(): ?array
    {
        return $this->paymentCovers;
    }

    /**
     * @param PaymentCover[] $value
     * @return Refund
     */
    public function setPaymentCovers(array $value): Refund
    {
        $this->paymentCovers = $value;
        return $this;
    }

}
