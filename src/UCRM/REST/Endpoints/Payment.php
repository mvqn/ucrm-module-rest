<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;

use UCRM\REST\Endpoints\Helpers\PaymentHelper;
use UCRM\REST\Endpoints\Lookups\PaymentCover;

/**
 * Class Payment
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/payments", "getById": "/payments/:id" }
 * @Endpoint { "post": "/payments" }
 *
 * @method int|null getClientId()
 * @method Payment setClientId(int $id)
 *
 * @method int|null getMethod()
 * @method Payment setMethod(int $method)
 *
 * @method string|null getCheckNumber()
 * @method Payment setCheckNumber(string $number)
 *
 * @method string|null getCreatedDate()
 * @see    Payment::setCreatedDate()
 *
 * @method float|null getAmount()
 * @method Payment setAmount(float $amount)
 *
 * @method string|null getCurrencyCode()
 * @method Payment setCurrencyCode(string $code)
 *
 * @method string|null getNote()
 * @method Payment setNote(string $note)
 *
 * @method string|null getReceiptSentDate()
 *
 * @method string|null getProviderName()
 * @method Payment setProviderName(string $name)
 *
 * @method string|null getProviderPaymentId()
 * @method Payment setProviderPaymentId(string $id)
 *
 * @method string|null getProviderPaymentTime()
 *
 * @method PaymentCover[]|null getPaymentCovers()
 * @method Payment setPaymentCovers(array $covers)
 *
 * @method float|null getCreditAmount()
 * @method Payment setCreditAmount(float $amount)
 *
 * @method int|null getInvoiceId()
 * @see    Payment::setInvoiceId()
 *
 * @method int[]|null getInvoiceIds()
 * @see    Payment::setInvoiceIds()
 *
 * @method bool|null getApplyToInvoicesAutomatically()
 * @see    Payment::setApplyToInvoicesAutomatically()
 *
 */
final class Payment extends EndpointObject
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
     * @Post
     * @Patch
     */
    protected $clientId;

    /**
     * @var int
     * @PostRequired
     * @Patch
     */
    protected $method;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $checkNumber;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $createdDate;

    /**
     * @param \DateTime $value
     * @return Payment
     */
    public function setCreatedDate(\DateTime $value): Payment
    {
        $this->createdDate = $value->format("c");
        return $this;
    }

    /**
     * @var float
     * @PostRequired
     * @Patch
     */
    protected $amount;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $currencyCode;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $note;

    /**
     * @var string
     */
    protected $receiptSentDate;

    /**
     * @param \DateTime $value
     * @return Payment
     */
    public function setReceiptSentDate(\DateTime $value): Payment
    {
        $this->receiptSentDate = $value->format("c");
        return $this;
    }

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $providerName;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $providerPaymentId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $providerPaymentTime;

    /**
     * @param \DateTime $value
     * @return Payment
     */
    public function setProviderPaymentTime(\DateTime $value): Payment
    {
        $this->providerPaymentTime = $value->format("c");
        return $this;
    }

    /**
     * @var PaymentCover[]
     */
    protected $paymentCovers;

    /**
     * @var float
     */
    protected $creditAmount;

    /**
     * @var int
     * @Post
     * @Patch
     *
     * @deprecated
     */
    protected $invoiceId;

    /**
     * @param int $value
     * @return Payment
     *
     * @deprecated
     */
    public function setInvoiceId(int $value): Payment
    {
        $this->applyToInvoicesAutomatically = false;
        $this->invoiceId = $value;
        return $this;
    }

    /**
     * @var int[]
     * @Post
     * @Patch
     */
    protected $invoiceIds;

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

    /**
     * @var bool
     * @Post
     * @Patch
     */
    protected $applyToInvoicesAutomatically;

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
