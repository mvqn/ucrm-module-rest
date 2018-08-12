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
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \ReflectionException
     */
    public function getClient(): Client
    {
        if($this->clientId !== null)
            $client = Client::getById($this->clientId);

        /** @var Client $client */
        return $client;
    }

    /**
     * @param Client $client
     * @return Payment
     */
    public function setClient(Client $client): Payment
    {
        $this->clientId = $client->getId();
        /** @var Payment $this */
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Currency
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \MVQN\Collections\CollectionException
     * @throws \ReflectionException
     */
    public function getCurrency(): Currency
    {
        if($this->currencyCode !== null)
            $currency = Currency::getByCode($this->currencyCode);

        /** @var Currency $currency */
        return $currency;
    }

    /**
     * @param Currency $currency
     * @return Payment
     */
    public function setCurrency(Currency $currency): Payment
    {
        $this->currencyCode = $currency->getCode();
        /** @var Payment $this */
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getInvoice(): Invoice
    {
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

    public function getInvoices(): Collection
    {
        if($this->invoiceIds !== null && $this->invoiceIds !== [])
        {
            $allInvoices = new Collection(Invoice::class, Invoice::get());
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


}