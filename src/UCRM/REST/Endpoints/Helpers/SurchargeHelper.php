<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\CollectionException;
use MVQN\Common\{ArraysException, PatternsException};

use UCRM\REST\RestClientException;
use UCRM\REST\Endpoints\{Collections\SurchargeCollection, EndpointException, Surcharge};

/**
 * Trait SurchargeHelper
 * @package UCRM\REST\Endpoints\Helpers
 */
trait SurchargeHelper
{
    // =================================================================================================================
    // OBJECT METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // NO OBJECT METHODS REQUIRED

    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // NO INSERT ENDPOINTS

    // =================================================================================================================
    // READ METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // STANDARD READ METHODS USED

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $name
     * @return SurchargeCollection
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function getByName(string $name): SurchargeCollection
    {
        $surcharges = Surcharge::get()->where("name", $name);

        return new SurchargeCollection($surcharges->elements());
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