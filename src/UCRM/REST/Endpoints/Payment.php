<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Helpers\PaymentHelper;
use UCRM\REST\Endpoints\Lookups\PaymentCover;

/**
 * Class Payment
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/payments", "getById": "/payments/:id" }
 * @endpoints { "post": "/payments" }
 */
final class Payment extends Endpoint
{
    use PaymentHelper;

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
    public const METHOD_COURTESY_CREDIT             = 11;
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
     * @post
     * @patch
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
     * @return Payment
     */
    public function setClientId(int $value): Payment
    {
        $this->clientId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post-required
     * @patch
     */
    protected $method;

    /**
     * @return int
     */
    public function getMethod(): int
    {
        return $this->method;
    }

    /**
     * @param int $value
     * @return Payment
     */
    public function setMethod(int $value): Payment
    {
        $this->method = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $checkNumber;

    /**
     * @return string|null
     */
    public function getCheckNumber(): ?string
    {
        return $this->checkNumber;
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setCheckNumber(string $value): Payment
    {
        $this->checkNumber = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
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
     * @return Payment
     */
    public function setCreatedDate(\DateTime $value): Payment
    {
        $this->createdDate = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     * @post-required
     * @patch
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
     * @return Payment
     */
    public function setAmount(float $value): Payment
    {
        $this->amount = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
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
     * @return Payment
     */
    public function setCurrencyCode(string $value): Payment
    {
        $this->currencyCode = $value;
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
     * @return Payment
     */
    public function setNote(string $value): Payment
    {
        $this->note = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $receiptSentDate;

    /**
     * @return string|null
     */
    public function getReceiptSentDate(): ?string
    {
        return $this->receiptSentDate;
    }

    /**
     * @param \DateTime $value
     * @return Payment
     */
    public function setReceiptSentDate(\DateTime $value): Payment
    {
        $this->receiptSentDate = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $providerName;

    /**
     * @return string|null
     */
    public function getProviderName(): ?string
    {
        return $this->providerName;
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setProviderName(string $value): Payment
    {
        $this->providerName = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $providerPaymentId;

    /**
     * @return string|null
     */
    public function getProviderPaymentId(): ?string
    {
        return $this->providerPaymentId;
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setProviderPaymentId(string $value): Payment
    {
        $this->providerPaymentId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $providerPaymentTime;

    /**
     * @return string|null
     */
    public function getProviderPaymentTime(): ?string
    {
        return $this->providerPaymentTime;
    }

    /**
     * @param \DateTime $value
     * @return Payment
     */
    public function setProviderPaymentTime(\DateTime $value): Payment
    {
        $this->providerPaymentTime = $value->format("c");
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var PaymentCover[]
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
     * @return Payment
     */
    public function setPaymentCovers(array $value): Payment
    {
        $this->paymentCovers = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     */
    protected $creditAmount;

    /**
     * @return float|null
     */
    public function getCreditAmount(): ?float
    {
        return $this->creditAmount;
    }

    /**
     * @param float $value
     * @return Payment
     */
    public function setCreditAmount(float $value): Payment
    {
        $this->creditAmount = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     *
     * @deprecated
     */
    protected $invoiceId;

    /**
     * @return int|null
     * @deprecated
     */
    public function getInvoiceId(): ?int
    {
        return $this->invoiceId;
    }

    /**
     * @param int $value
     * @return Payment
     * @deprecated
     */
    public function setInvoiceId(int $value): Payment
    {
        $this->applyToInvoicesAutomatically = false;
        $this->invoiceId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int[]
     * @post
     * @patch
     */
    protected $invoiceIds;

    /**
     * @return int[]|null
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoiceIds;
    }

    /**
     * @param int[] $value
     * @return Payment
     */
    public function setInvoiceIds(array $value): Payment
    {
        $this->applyToInvoicesAutomatically = false;
        $this->invoiceIds = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     * @post
     * @patch
     */
    protected $applyToInvoicesAutomatically;

    /**
     * @return bool|null
     */
    public function getApplyToInvoicesAutomatically(): ?bool
    {
        return $this->applyToInvoicesAutomatically;
    }

    /**
     * @param bool $value
     * @return Payment
     */
    public function setApplyToInvoicesAutomatically(bool $value): Payment
    {
        if($value)
        {
            $this->invoiceId = null;
            $this->invoiceIds = null;
        }

        $this->applyToInvoicesAutomatically = $value;
        return $this;
    }

}
