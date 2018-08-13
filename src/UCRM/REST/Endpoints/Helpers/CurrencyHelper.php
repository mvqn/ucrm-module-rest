<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use UCRM\REST\Endpoints\Currency;

/**
 * Trait CurrencyHelper
 *
 * @package UCRM\REST\Endpoints\Helpers
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait CurrencyHelper
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $name
     * @return null|Currency
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public static function getByName(string $name): ?Currency
    {
        $currencies = Currency::get();

        /** @var Currency $currency */
        $currency = $currencies->where("name", $name)->first();
        return $currency;
    }

    /**
     * @param string $code
     * @return null|Currency
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public static function getByCode(string $code): ?Currency
    {
        $currencies = Currency::get();

        /** @var Currency $currency */
        $currency = $currencies->where("code", $code)->first();
        return $currency;
    }

    /**
     * @param string $symbol
     * @return null|Currency
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public static function getBySymbol(string $symbol): ?Currency
    {
        $currencies = Currency::get();

        /** @var Currency $currency */
        $currency = $currencies->where("symbol", $symbol)->first();
        return $currency;
    }



}