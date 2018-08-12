<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\EndpointException;
use UCRM\REST\RestClient;

use UCRM\REST\Endpoints\Currency;
use UCRM\REST\Endpoints\State;
use UCRM\REST\RestClientException;

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
     * @throws RestClientException
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public static function getByName(string $name): ?Currency
    {
        $currencies = new Collection(Currency::class, Currency::get());

        /** @var Currency $currency */
        $currency = $currencies->where("name", $name)->first();
        return $currency;
    }

    /**
     * @param string $code
     * @return null|Currency
     * @throws RestClientException
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public static function getByCode(string $code): ?Currency
    {
        $currencies = new Collection(Currency::class, Currency::get());

        /** @var Currency $currency */
        $currency = $currencies->where("code", $code)->first();
        return $currency;
    }

    /**
     * @param string $symbol
     * @return null|Currency
     * @throws RestClientException
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public static function getBySymbol(string $symbol): ?Currency
    {
        $currencies = new Collection(Currency::class, Currency::get());

        /** @var Currency $currency */
        $currency = $currencies->where("symbol", $symbol)->first();
        return $currency;
    }



}