<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use UCRM\REST\Endpoints\{Collections\SurchargeCollection, Exceptions\EndpointException, Endpoint, Surcharge, Service};

/**
 * Trait SurchargeHelper
 * @package UCRM\REST\Endpoints\Helpers
 */
trait SurchargeHelper
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Surcharge
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function create(): Surcharge
    {
        /** @var Endpoint $data */
        $data = $this;

        /** @var Surcharge $surcharge */
        $surcharge = Surcharge::post($data, []);

        return $surcharge;
    }

    // -----------------------------------------------------------------------------------------------------------------

    public static function getByName(string $name): SurchargeCollection
    {
        $surcharges = Surcharge::get()->where("name", $name);

        return new SurchargeCollection($surcharges->elements());
    }


}