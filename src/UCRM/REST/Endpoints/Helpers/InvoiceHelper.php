<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\CollectionException;
use MVQN\Common\{ArraysException, PatternsException};

use UCRM\REST\Endpoints\Exceptions\EndpointException;
use UCRM\REST\Exceptions\RestClientException;
use UCRM\REST\Exceptions\RestObjectException;

use UCRM\REST\Endpoints\{Invoice, Collections\InvoiceCollection};
use UCRM\REST\Endpoints\Lookups\InvoiceItem;


trait InvoiceHelper
{
    use Common\ClientHelpers;
    use Common\InvoiceTemplateHelpers;
    use Common\OrganizationCountryHelpers;
    use Common\OrganizationStateHelpers;
    use Common\ClientCountryHelpers;
    use Common\ClientStateHelpers;

    // =================================================================================================================
    // OBJECT METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param InvoiceItem $item
     * @return Invoice
     */
    public function addInvoiceItem(InvoiceItem $item): Invoice
    {
        echo $item;

        // TODO: Implement!

        /** @var Invoice $this */
        return $this;
    }

    /**
     * @param int $line
     * @return Invoice
     */
    public function delInvoiceItem(int $line): Invoice
    {
        echo $line;

        // TODO: Implement!

        /** @var Invoice $this */
        return $this;
    }

    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // NO INSERT ENDPOINTS

    // =================================================================================================================
    // READ METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // STANDARD READ METHODS USED

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param int $clientId
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
    public static function getByClientId(int $clientId): InvoiceCollection
    {
        /** @var InvoiceCollection $invoices */
        $invoices = Invoice::get("", [], [ "clientId" => $clientId ]);

        return new InvoiceCollection($invoices->elements());
    }

    /**
     * @param \DateTime $date
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
    public static function getByCreatedDate(\DateTime $date): InvoiceCollection
    {
        /** @var InvoiceCollection $invoices */
        $invoices = Invoice::get("", [], [ "createdDateFrom" => $date->format("Y-m-d"),
            "createdDateTo" => $date->format("Y-m-d") ]);

        return new InvoiceCollection($invoices->elements());
    }

    /**
     * @param \DateTime $from
     * @param \DateTime $to
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
    public static function getByCreatedDateBetween(\DateTime $from, \DateTime $to): InvoiceCollection
    {
        /** @var InvoiceCollection $invoices */
        $invoices = Invoice::get("", [], [ "createdDateFrom" => $from->format("Y-m-d"),
            "createdDateTo" => $to->format("Y-m-d") ]);

        return new InvoiceCollection($invoices->elements());
    }

    // TODO: Add more helpers for the remaining query parameters!

    // =================================================================================================================
    // UPDATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // STANDARD UPDATE METHODS USED

    // =================================================================================================================
    // DELETE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // NO DELETE ENDPOINTS

    // =================================================================================================================
    // EXTRA FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Invoice
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws RestObjectException
     * @throws \ReflectionException
     */
    public function send(): Invoice
    {
        /** @var Invoice $invoice */
        $invoice = Invoice::patch(null, [ "id" => $this->getId() ], "/send");
        return $invoice;
    }

}