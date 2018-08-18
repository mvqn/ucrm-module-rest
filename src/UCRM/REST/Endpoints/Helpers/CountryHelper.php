<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\Exceptions\AnnotationReaderException;
use MVQN\Collections\Exceptions\CollectionException;
use MVQN\Helpers\Exceptions\ArrayHelperException;
use MVQN\Helpers\Exceptions\PatternMatchException;

use UCRM\REST\Endpoints\Exceptions\EndpointException;
use UCRM\REST\Exceptions\RestClientException;

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
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return StateCollection
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function getStates(): StateCollection
    {
        if($this->id === null)
            throw new EndpointException("Country->getStates() cannot be called when the Country ID is not set!");

        return new StateCollection(State::get("/countries/".$this->id."/states"));
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $name
     * @return Country|null
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
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
     * @throws ArrayHelperException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
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










}