<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\QuoteTemplate;

/**
 * Trait QuoteTemplateHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait QuoteTemplateHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return QuoteTemplate|null
     * @throws \Exception
     */
    public function getQuoteTemplate(): ?QuoteTemplate
    {
        if(property_exists($this, "quoteTemplateId") && $this->{"quoteTemplateId"} !== null)
            $quoteTemplate = QuoteTemplate::getById($this->{"quoteTemplateId"});

        /** @var QuoteTemplate $quoteTemplate */
        return $quoteTemplate;
    }

    /**
     * @param QuoteTemplate $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setQuoteTemplate(QuoteTemplate $value): self
    {
        $this->{"quoteTemplateId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $name
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws \Exception
     */
    public function setQuoteTemplateByName(string $name): self
    {
        /** @var QuoteTemplate $invoiceTemplate */
        $invoiceTemplate = QuoteTemplate::getByName($name)->first();
        $this->{"quoteTemplateId"} = $invoiceTemplate->getId();

        /** @var self $this */
        return $this;
    }


}