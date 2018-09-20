<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\InvoiceTemplate;

/**
 * Trait InvoiceTemplateHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait InvoiceTemplateHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return InvoiceTemplate|null
     * @throws \Exception
     */
    public function getInvoiceTemplate(): ?InvoiceTemplate
    {
        if(property_exists($this, "invoiceTemplateId") && $this->{"invoiceTemplateId"} !== null)
            $invoiceTemplate = InvoiceTemplate::getById($this->{"invoiceTemplateId"});

        /** @var InvoiceTemplate $invoiceTemplate */
        return $invoiceTemplate;
    }

    /**
     * @param InvoiceTemplate $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setInvoiceTemplate(InvoiceTemplate $value): self
    {
        $this->{"invoiceTemplateId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $name
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws \Exception
     */
    public function setInvoiceTemplateByName(string $name): self
    {
        /** @var InvoiceTemplate $invoiceTemplate */
        $invoiceTemplate = InvoiceTemplate::getByName($name)->first();
        $this->{"invoiceTemplateId"} = $invoiceTemplate->getId();

        /** @var self $this */
        return $this;
    }


}