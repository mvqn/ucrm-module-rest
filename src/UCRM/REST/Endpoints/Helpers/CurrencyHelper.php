<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\CollectionException;
use MVQN\Common\{ArraysException, PatternsException};

use UCRM\REST\Endpoints\EndpointException;
use UCRM\REST\RestClientException;

use UCRM\REST\Endpoints\Collections\CurrencyCollection;
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
    // OBJECT METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // NO OBJECT METHODS REQUIRED

    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // STANDARD INSERT METHOD USED

    // =================================================================================================================
    // READ METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // STANDARD READ METHODS USED

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $name
     * @return CurrencyCollection
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function getByName(string $name): CurrencyCollection
    {
        $currencies = Currency::get();

        /** @var CurrencyCollection $currencies */
        $currencies = $currencies->where("name", $name);
        return new CurrencyCollection($currencies->elements());
    }

    /**
     * @param string $code
     * @return Currency|null
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
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
     * @return CurrencyCollection
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function getBySymbol(string $symbol): CurrencyCollection
    {
        $currencies = Currency::get();

        /** @var CurrencyCollection $currencies */
        $currencies = $currencies->where("symbol", $symbol);
        return new CurrencyCollection($currencies->elements());
    }

    // =================================================================================================================
    // UPDATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // NO UPDATE ENDPOINTS

    // =================================================================================================================
    // DELETE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // NO DELETE ENDPOINTS

    // =================================================================================================================
    // EXTRA FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------

    // NO EXTRA FUNCTIONS AT THIS TIME

}