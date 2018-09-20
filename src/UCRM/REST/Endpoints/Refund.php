<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;
use MVQN\REST\Annotations\PostAnnotation as Post;
use MVQN\REST\Annotations\PostRequiredAnnotation as PostRequired;

use UCRM\REST\Endpoints\Helpers\RefundHelper;
use UCRM\REST\Endpoints\Lookups\PaymentCover;

/**
 * Class Refund
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/refunds", "getById": "/refunds/:id" }
 * @Endpoint { "post": "/refunds" }
 *
 * @method int|null getMethod()
 * @method Refund setMethod(int $method)
 * @method string|null getCreatedDate()
 * @see Refund::setCreatedDate()
 * @method float|null getAmount()
 * @method Refund setAmount(float $amount)
 * @method string|null getNote()
 * @method Refund setNote(string $note)
 * @method int|null getClientId()
 * @method Refund setClientId(int $id)
 * @method int|null getCurrencyCode()
 * @method Refund setCurrencyCode(int $code)
 * @method PaymentCover[]|null getPaymentCovers()
 * @method Refund setPaymentCovers(array $covers)
 *
 */
final class Refund extends EndpointObject
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
     * @PostRequired
     */
    protected $method;

    /**
     * @var string
     * @Post
     */
    protected $createdDate;

    /**
     * @param \DateTime $date
     * @return Refund
     */
    public function setCreatedDate(\DateTime $date): Refund
    {
        $this->createdDate = $date->format("c");
        return $this;
    }

    /**
     * @var float
     * @PostRequired
     */
    protected $amount;

    /**
     * @var string
     * @Post
     */
    protected $note;

    /**
     * @var int
     * @Post
     */
    protected $clientId;

    /**
     * @var string
     * @Post
     */
    protected $currencyCode;

    /**
     * @var PaymentCover[]
     * @Post
     */
    protected $paymentCovers;

}
