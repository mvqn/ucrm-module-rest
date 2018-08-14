<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Country;
use UCRM\REST\Endpoints\Currency;

trait CurrencyHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Currency
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getCurrency(): Currency
    {
        if(property_exists($this, "currencyId") && $this->{"currencyId"} !== null)
            $currency = Currency::getById($this->{"currencyId"});

        /** @var Currency $currency */
        return $currency;
    }



    /**
     * @param Currency $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setCurrency(Currency $value): self
    {
        $this->{"currencyId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $code
     * @return self
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function setCurrencyByCode(string $code): self
    {
        /** @var Currency $currency */
        $currency = Currency::getByCode($code);
        $this->{"currencyId"} = $currency->getId();

        /** @var self $this */
        return $this;
    }


}