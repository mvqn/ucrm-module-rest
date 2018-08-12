<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Collections\Collection;

use UCRM\REST\Exceptions\RestClientException;

use UCRM\REST\Endpoints\{Country,State};
use UCRM\REST\Endpoints\Exceptions\EndpointException;





/**
 * Trait StateHelper
 *
 * @package UCRM\REST\Endpoints\Helpers
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait StateHelper
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

     /**
     * @return Country
     * @throws EndpointException
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public function getCountry(): Country
    {
        if($this->countryId === null)
            throw new EndpointException("State->getCountry() cannot be called when the Country ID is not set!");

        /** @var Country $country */
        $country = Country::getById($this->countryId);
        return $country;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param Country $country
     * @param string $name
     * @return State|null
     * @throws EndpointException
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public static function getByName(Country $country, string $name): ?State
    {
        if($country === null)
            throw new EndpointException("Cannot call State->getByName() without providing a valid Country!");

        /** @var Collection $states */
        $states = $country->getStates();

        /** @var State $state */
        $state = $states->where("name", $name)->first();
        return $state;
    }

    /**
     * @param Country $country
     * @param string $code
     * @return null|State
     * @throws EndpointException
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public static function getByCode(Country $country, string $code): ?State
    {
        if($country === null)
            throw new EndpointException("Cannot call State->getByName() without providing a valid Country!");

        /** @var Collection $states */
        $states = $country->getStates();

        /** @var State $state */
        $state = $states->where("code", $code)->first();
        return $state;
    }


}