<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use UCRM\REST\Endpoints\{Collections\ServiceSurchargeCollection,
    Exceptions\EndpointException,
    Endpoint,
    ServiceSurcharge,
    Service};

/**
 * Trait ServiceSurchargeHelper
 * @package UCRM\REST\Endpoints\Helpers
 */
trait ServiceSurchargeHelper
{
    use Common\ServiceHelpers;

    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return ServiceSurcharge
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function create(): ServiceSurcharge
    {
        /** @var Endpoint $data */
        $data = $this;

        /** @var ServiceSurcharge $serviceSurcharge */
        $serviceSurcharge = ServiceSurcharge::post($data, ["serviceId" => $this->serviceId]);

        return $serviceSurcharge;
    }

    /**
     * @return ServiceSurcharge
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function update(): ServiceSurcharge
    {
        /** @var Endpoint $data */
        $data = $this;

        /** @var ServiceSurcharge $serviceSurcharge */
        $serviceSurcharge = ServiceSurcharge::patch($data, [ "id" => $this->getId() ]);

        return $serviceSurcharge;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param Service $service
     * @return ServiceSurchargeCollection
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public static function getByService(Service $service): ServiceSurchargeCollection
    {
        $surcharges = ServiceSurcharge::get("", [ "serviceId" => $service->getId() ]);

        return new ServiceSurchargeCollection($surcharges->elements());
    }


}