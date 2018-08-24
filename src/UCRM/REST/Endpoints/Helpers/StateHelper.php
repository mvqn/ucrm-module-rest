<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\CollectionException;
use MVQN\Common\{ArraysException, PatternsException};

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
    use Common\CountryHelpers;

    // =================================================================================================================
    // OBJECT METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // NO OBJECT METHODS REQUIRED

    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // STANDARD CREATE METHODS USED

    // =================================================================================================================
    // READ METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // STANDARD READ METHODS USED

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param Country $country
     * @param string $name
     * @return null|State
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
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
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
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