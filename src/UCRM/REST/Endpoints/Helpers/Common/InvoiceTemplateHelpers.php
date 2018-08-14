<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\InvoiceTemplate;

trait InvoiceTemplateHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return null|InvoiceTemplate
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
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
     * @return InvoiceTemplateHelpers
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