<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Collections\Collection;

use UCRM\REST\Exceptions\RestClientException;

use UCRM\REST\Endpoints\{Country, State};
use UCRM\REST\Endpoints\Exceptions\EndpointException;
use UCRM\REST\Endpoints\Collections\{CountryCollection};

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
     * @return Collection
     * @throws EndpointException
     * @throws RestClientException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     */
    public function getStates(): Collection
    {
        if($this->id === null)
            throw new EndpointException("Country->getStates() cannot be called when the Country ID is not set!");

        return State::get("/countries/".$this->id."/states");
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $name
     * @return CountryCollection
     * @throws EndpointException
     * @throws RestClientException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     */
    public static function getByName(string $name): CountryCollection
    {
        $countries = Country::get();

        /** @var CountryCollection $countryList */
        $countryList = $countries->where("name", $name);
        return new CountryCollection($countryList->elements());
    }

    /**
     * @param string $code
     * @return null|Country
     * @throws EndpointException
     * @throws RestClientException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
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