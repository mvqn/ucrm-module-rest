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
use UCRM\REST\Endpoints\PaymentPlan;


trait PaymentPlanHelper
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
     * @throws \UCRM\REST\Exceptions\RestClientException
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
     * @return PaymentPlan
     */
    public function setClient(Client $client): PaymentPlan
    {
        $this->clientId = $client->getId();
        /** @var PaymentPlan $this */
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Currency
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getCurrency(): Currency
    {
        if($this->currencyId !== null)
            $currency = Currency::getById($this->currencyId);

        /** @var Currency $currency */
        return $currency;
    }

    /**
     * @param Currency $currency
     * @return PaymentPlan
     */
    public function setCurrency(Currency $currency): PaymentPlan
    {
        $this->currencyId = $currency->getId();
        /** @var PaymentPlan $this */
        return $this;
    }

    public function setCurrencyByCode(string $code): PaymentPlan
    {
        $currency = Currency::getByCode($code);

        $this->currencyId = $currency ? $currency->getId() : null;
        /** @var PaymentPlan $this */
        return $this;
    }


}