<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Invoice;

/**
 * Trait InvoiceHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait InvoiceHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Invoice|null
     * @throws \Exception
     */
    public function getInvoice(): ?Invoice
    {
        if(property_exists($this, "invoiceId") && $this->{"invoiceId"} !== null)
            $invoice = Invoice::getById($this->{"invoiceId"});

        /** @var Invoice $invoice */
        return $invoice;
    }

    /**
     * @param Invoice $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setPayment(Invoice $value): self
    {
        $this->{"invoiceId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

}
