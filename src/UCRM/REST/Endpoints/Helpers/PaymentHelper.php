<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\Collection;
use MVQN\Helpers\ArrayHelperPathException;
use MVQN\Helpers\PatternMatchException;
use UCRM\REST\Endpoints\Currency;
use UCRM\REST\Endpoints\Invoice;
use UCRM\REST\Endpoints\PaymentCover;
use UCRM\REST\Endpoints\User;
use UCRM\REST\Exceptions\RestObjectException;

use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\Organization;
use UCRM\REST\Endpoints\Client;
use UCRM\REST\Endpoints\Country;
use UCRM\REST\Endpoints\State;
use UCRM\REST\Endpoints\Payment;


trait PaymentHelper
{
    use Common\CurrencyHelpers;

    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------


    public static function create(): Payment
    {
        $client = new Payment([

        ]);

        return $client;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $firstName
     * @param string $lastName
     * @param bool $isLead
     * @param Organization|null $organization
     * @return Client
     * @throws \ReflectionException
     */
    public static function createResidential(string $firstName, string $lastName, bool $isLead = false,
                                             Organization $organization = null): Client
    {
        $client =
            Client::create(Client::CLIENT_TYPE_RESIDENTIAL, $isLead, $organization)
                ->setFirstName($firstName)
                ->setLastName($lastName);

        return $client;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $companyName
     * @param string $firstName
     * @param string $lastName
     * @param bool $isLead
     * @param Organization|null $organization
     * @return Client
     * @throws \ReflectionException
     */
    public static function createCommercial(string $companyName, string $firstName, string $lastName,
                                            bool $isLead = false, Organization $organization = null): Client
    {
        $client =
            Client::create(Client::CLIENT_TYPE_COMMERCIAL, $isLead, $organization)
                ->setFirstName($firstName)
                ->setLastName($lastName)
                ->setCompanyName($companyName);

        return $client;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Client
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function insert(): Client
    {
        /** @var Client $data */
        $data = $this;

        /** @var Client $result */
        $result = Client::post($data);
        return $result;
    }







    // -----------------------------------------------------------------------------------------------------------------



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
     * @return Collection
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \MVQN\Collections\CollectionException
     * @throws \ReflectionException
     */
    public function getInvoices(): Collection
    {
        if($this->invoiceIds !== null && $this->invoiceIds !== [])
        {
            $allInvoices = Invoice::get();
            $invoices = [];

            foreach($this->invoiceIds as $id)
                $invoices = $allInvoices->where("id", $id);

            return new Collection(Invoice::class, $invoices);
        }

        return new Collection(Invoice::class);
    }

    /**
     * @param Collection $invoices
     * @return Payment
     */
    public function setInvoices(Collection $invoices): Payment
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
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \ReflectionException
     */
    public function sendReceipt(): Payment
    {
        /** @var Payment $payment */
        $payment = Payment::patch($this->id, null, "/send-receipt");
        return $payment;
    }

}