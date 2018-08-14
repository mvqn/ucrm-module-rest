<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Lookups;

use UCRM\REST\Endpoints\Helpers\Common\{InvoiceHelpers,PaymentHelpers,RefundHelpers};

/**
 * Class PaymentCover
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class PaymentCover extends Lookup
{
    use InvoiceHelpers;
    use PaymentHelpers;
    use RefundHelpers;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $paymentId;

    /**
     * @return int|null
     */
    public function getPaymentId(): ?int
    {
        return $this->paymentId;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $invoiceId;

    /**
     * @return int|null
     */
    public function getInvoiceId(): ?int
    {
        return $this->invoiceId;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $refundId;

    /**
     * @return int|null
     */
    public function getRefundId(): ?int
    {
        return $this->refundId;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     */
    protected $amount;

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

}
