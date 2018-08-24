<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\CollectionException;
use MVQN\Common\{ArraysException, PatternsException};

use UCRM\REST\Endpoints\EndpointException;
use UCRM\REST\RestClientException;

use UCRM\REST\Endpoints\Collections\StateCollection;
use UCRM\REST\Endpoints\{Country, State};


/**
 * Trait CountryHelper
 *
 * @package UCRM\REST\Endpoints\Helpers
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait CountryHelper
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
     * @return StateCollection
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function getStates(): StateCollection
    {
        if($this->id === null)
            throw new EndpointException("Country->getStates() cannot be called when the Country ID is not set!");

        return new StateCollection(State::get("/countries/".$this->id."/states")->elements());
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $name
     * @return Country|null
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function getByName(string $name): ?Country
    {
        $countries = Country::get();

        /** @var Country $country */
        $country = $countries->where("name", $name)->first();
        return $country;
    }

    /**
     * @param string $code
     * @return Country|null
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function getByCode(string $code): ?Country
    {
        $countries = Country::get();

        /** @var Country $country */
        $country = $countries->where("code", $code)->first(); // UNIQUE?
        return $country;
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