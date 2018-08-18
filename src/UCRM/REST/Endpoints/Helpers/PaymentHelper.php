<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\Exceptions\AnnotationReaderException;
use MVQN\Collections\Exceptions\CollectionException;
use MVQN\Helpers\Exceptions\ArrayHelperException;
use MVQN\Helpers\Exceptions\PatternMatchException;

use UCRM\REST\Endpoints\Exceptions\EndpointException;
use UCRM\REST\Exceptions\RestClientException;

use UCRM\REST\Endpoints\Collections\{InvoiceCollection};
use UCRM\REST\Endpoints\{Invoice, Payment};

/**
 * Trait PaymentHelper
 * @package UCRM\REST\Endpoints\Helpers
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait PaymentHelper
{
    use Common\CurrencyHelpers;

    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Payment
     */
    public static function create(): Payment
    {
        $client = new Payment([

        ]);

        return $client;
    }


    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Payment
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function insert(): Payment
    {
        /** @var Payment $data */
        $data = $this;

        /** @var Payment $result */
        $result = Payment::post($data);

        return $result;
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getInvoice(): ?Invoice
    {
        $invoice = null;

        if($this->invoiceId !== null)
            $invoice = Invoice::getById($this->invoiceId);

        /** @var Invoice $invoice */
        return $invoice;
    }

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
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
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

    /**
     * @return Payment
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function sendReceipt(): Payment
    {
        /** @var Payment $payment */
        $payment = Payment::patch($this->id, null, "/send-receipt");
        return $payment;
    }

}