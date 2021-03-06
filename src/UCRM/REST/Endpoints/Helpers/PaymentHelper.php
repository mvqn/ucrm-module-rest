<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

// Core
use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\CollectionException;
use MVQN\Common\ArraysException;
use MVQN\Common\PatternsException;

// Exceptions
use UCRM\REST\Endpoints\EndpointException;
use UCRM\REST\RestClientException;
use UCRM\REST\RestObjectException;

// Collections
use UCRM\REST\Endpoints\Collections\InvoiceCollection;

// Endpoints
use UCRM\REST\Endpoints\Invoice;
use UCRM\REST\Endpoints\Payment;

/**
 * Trait PaymentHelper
 *
 * @package UCRM\REST\Endpoints\Helpers
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait PaymentHelper
{
    use Common\CurrencyHelpers;

    // =================================================================================================================
    // OBJECT METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Invoice|null
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function getInvoice(): ?Invoice
    {
        $invoice = null;

        if($this->invoiceId !== null)
            $invoice = Invoice::getById($this->invoiceId);

        /** @var Invoice $invoice */
        return $invoice;
    }

    /**
     * @param Invoice $invoice
     * @return Payment
     */
    public function setInvoice(Invoice $invoice): Payment
    {
        $this->applyToInvoicesAutomatically = false;
        $this->invoiceId = $invoice->getId();
        /** @var Payment $this */
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return InvoiceCollection
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function getInvoices(): InvoiceCollection
    {
        if($this->invoiceIds !== null && $this->invoiceIds !== [])
        {
            $allInvoices = Invoice::get();
            $invoices = [];

            foreach($this->invoiceIds as $id)
                $invoices = $allInvoices->where("id", $id);

            return new InvoiceCollection($invoices);
        }

        return new InvoiceCollection();
    }

    /**
     * @param InvoiceCollection $invoices
     * @return Payment
     */
    public function setInvoices(InvoiceCollection $invoices): Payment
    {
        if($invoices->type() === Invoice::class && $invoices->count() > 0)
        {
            /** @var Invoice $invoice */

            $ids = [];

            foreach($invoices as $invoice)
                $ids[] = $invoice->getId();

            $this->applyToInvoicesAutomatically = false;
            $this->invoiceIds = $ids;

            /** @var Payment $this */
            return $this;
        }

        /** @var Payment $this */
        return $this;
    }

    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // READ METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // UPDATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // DELETE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // EXTRA FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Payment
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws RestObjectException
     * @throws \ReflectionException
     */
    public function sendReceipt(): Payment
    {
        /** @var Payment $payment */
        $payment = Payment::patch(null, [ "id" => $this->getId() ], "/send-receipt");
        return $payment;
    }

}