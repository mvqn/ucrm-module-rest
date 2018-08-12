<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Collections\Collection;

use UCRM\REST\Exceptions\RestClientException;

use UCRM\REST\Endpoints\{Country,State};
use UCRM\REST\Endpoints\Exceptions\EndpointException;

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
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public function getStates(): Collection
    {
        if($this->id === null)
            throw new EndpointException("Country->getStates() cannot be called when the Country ID is not set!");

        return new Collection(State::class, State::get("/countries/".$this->id."/states"));
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $name
     * @return null|Country
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public static function getByName(string $name): ?Country
    {
        $countries = new Collection(Country::class, Country::get());

        /** @var Country $country */
        $country = $countries->where("name", $name)->first();
        return $country;
    }

    /**
     * @param string $code
     * @return null|Country
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public static function getByCode(string $code): ?Country
    {
        $countries = new Collection(Country::class, Country::get());

        /** @var Country $country */
        $country = $countries->where("code", $code)->first();
        return $country;
    }


}