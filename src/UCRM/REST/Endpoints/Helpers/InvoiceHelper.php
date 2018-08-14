<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;


use UCRM\REST\Endpoints\{Collections\ClientContactCollection, Exceptions\EndpointException, Client, Invoice};
use UCRM\REST\Endpoints\Lookups\{ClientBankAccount,
    ClientContact,
    ClientContactAttribute,
    ClientContactType,
    ClientTag,
    InvoiceItem};


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
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
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
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
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
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function sendInvitationEmail(): Client
    {
        /** @var Client $client */
        $client = Client::patch(null, [ "id" => $this->getId() ], "/send-invitation");
        return $client;
    }




    public function addInvoiceItem(InvoiceItem $item): Invoice
    {
        $this->items[] = $item->toArray();
        return $this;
    }

    public function delInvoiceItem(int $index): Invoice
    {
        $this->items[$index] = new InvoiceItem();
        return $this;
    }


}