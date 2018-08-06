<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Exceptions\RestClientException;


/**
 * Class PaymentCover
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class PaymentCover extends Lookup
{
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
    protected $paymentId;

    /**
     * @return int
     */
    public function getPaymentId(): int
    {
        return $this->paymentId;
    }

    /** @var Payment $payment */
    protected $payment = null;

    /**
     * @return Payment
     * @throws RestClientException
     */
    public function getPayment(): Payment
    {
        // Cache the value here for future lookups...
        if($this->payment === null)
            $this->payment = Payment::getById($this->paymentId);

        return $this->payment;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $invoiceId;

    /**
     * @return int
     */
    public function getInvoiceId(): int
    {
        return $this->invoiceId;
    }

    /** @var Invoice $invoice */
    protected $invoice = null;

    /**
     * @return Invoice
     * @throws RestClientException
     */
    public function getInvoice(): Invoice
    {
        // Cache the value here for future lookups...
        if($this->invoice === null)
            $this->invoice = Invoice::getById($this->invoiceId);

        return $this->invoice;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $refundId;

    /**
     * @return int
     */
    public function getRefundId(): int
    {
        return $this->refundId;
    }

    /** @var Refund $refund */
    protected $refund = null;

    /**
     * @return Refund
     * @throws RestClientException
     */
    public function getRefund(): Refund
    {
        // Cache the value here for future lookups...
        if($this->refund === null)
            $this->refund = Refund::getById($this->refundId);

        return $this->refund;
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

}



