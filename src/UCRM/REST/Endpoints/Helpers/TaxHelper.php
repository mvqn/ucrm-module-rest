<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Common\{ArraysException, PatternsException};

use UCRM\REST\Endpoints\EndpointException;
use UCRM\REST\{RestClientException, RestObjectException};
use UCRM\REST\Endpoints\Tax;

trait TaxHelper
{





    // =================================================================================================================
    // OBJECT METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // NO OBJECT METHODS REQUIRED

    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // STANDARD CREATE METHODS USED

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $name
     * @param float $rate
     * @param string|null $agencyName
     * @return Tax
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws RestObjectException
     * @throws \ReflectionException
     */
    public static function create(string $name, float $rate, string $agencyName = null): Tax
    {
        $data = new Tax([
            "name" => $name,
            "rate" => $rate,
            "agencyName" => $agencyName
        ]);

        /** @var Tax $result */
        $result = Tax::post($data);
        return $result;
    }

    // =================================================================================================================
    // READ METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // STANDARD READ METHODS USED

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