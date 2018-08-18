<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\Exceptions\AnnotationReaderException;
//use MVQN\Collections\Exceptions\CollectionException;
use MVQN\Helpers\Exceptions\ArrayHelperException;
use MVQN\Helpers\Exceptions\PatternMatchException;

use UCRM\REST\Endpoints\Exceptions\EndpointException;
use UCRM\REST\Exceptions\RestClientException;
use UCRM\REST\Exceptions\RestObjectException;

use UCRM\REST\Endpoints\{Client, Invoice};
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
    // CRUD FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Invoice
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function create(): Invoice
    {
        /** @var Invoice $data */
        $data = $this;

        /** @var Invoice $invoice */
        $invoice = Invoice::post($data, [ "clientId" => $this->getClientId() ]);

        return $invoice;
    }

    /**
     * @return Invoice
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function update(): Invoice
    {
        /** @var Invoice $data */
        $data = $this;

        /** @var Invoice $invoice */
        $invoice = Invoice::patch($data, [ "id" => $this->getId() ]);

        return $invoice;
    }

    // =================================================================================================================
    // EXTRA FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function sendInvitationEmail(): Client
    {
        /** @var Client $client */
        $client = Client::patch(null, [ "id" => $this->getId() ], "/send-invitation");
        return $client;
    }

    /**
     * @param InvoiceItem $item
     * @return Invoice
     * @throws AnnotationReaderException
     * @throws RestObjectException
     * @throws \ReflectionException
     */
    public function addInvoiceItem(InvoiceItem $item): Invoice
    {
        $this->items[] = $item->toArray();

        /** @var Invoice $this */
        return $this;
    }

    /**
     * @param int $index
     * @return Invoice
     */
    public function delInvoiceItem(int $index): Invoice
    {
        $this->items[$index] = new InvoiceItem();

        /** @var Invoice $this */
        return $this;
    }


}