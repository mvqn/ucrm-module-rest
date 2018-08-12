<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\Collection;
use MVQN\Helpers\ArrayHelperPathException;
use MVQN\Helpers\PatternMatchException;
use UCRM\REST\Endpoints\Currency;
use UCRM\REST\Endpoints\PaymentCover;
use UCRM\REST\Endpoints\User;
use UCRM\REST\Exceptions\RestObjectException;

use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\Organization;
use UCRM\REST\Endpoints\Client;
use UCRM\REST\Endpoints\Country;
use UCRM\REST\Endpoints\State;
use UCRM\REST\Endpoints\Refund;


trait RefundHelper
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
     * @return Refund
     */
    public function setClient(Client $client): Refund
    {
        $this->clientId = $client->getId();
        /** @var Refund $this */
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
     * @return Refund
     */
    public function setCurrency(Currency $currency): Refund
    {
        $this->currencyCode = $currency->getCode();
        /** @var Refund $this */
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param PaymentCover $paymentCover
     * @return Refund
     * @throws AnnotationReaderException
     * @throws \ReflectionException
     */
    public function addPaymentCover(PaymentCover $paymentCover): Refund
    {
        $this->paymentCovers[] = $paymentCover->toArray();
        /** @var Refund $this */
        return $this;
    }

}