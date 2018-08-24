<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Common\ArraysException;
use MVQN\Common\PatternsException;
use UCRM\REST\Endpoints\{Collections\ServiceSurchargeCollection,
    EndpointException,
    Endpoint,
    ServiceSurcharge,
    Service};
use UCRM\REST\RestClientException;
use UCRM\REST\RestObjectException;

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
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws RestObjectException
     * @throws \ReflectionException
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
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws RestObjectException
     * @throws \ReflectionException
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
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \MVQN\Collections\CollectionException
     * @throws \ReflectionException
     */
    public static function getByService(Service $service): ServiceSurchargeCollection
    {
        $surcharges = ServiceSurcharge::get("", [ "serviceId" => $service->getId() ]);

        return new ServiceSurchargeCollection($surcharges->elements());
    }


}