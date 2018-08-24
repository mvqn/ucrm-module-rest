<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Common\ArraysException;
use MVQN\Common\PatternsException;
use UCRM\REST\Endpoints\Collections\ServiceDeviceCollection;
use UCRM\REST\Endpoints\DeviceInterface;
use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\EndpointException;
use UCRM\REST\Endpoints\Service;
use UCRM\REST\Endpoints\ServiceDevice;
use UCRM\REST\Endpoints\Vendor;
use UCRM\REST\Exceptions\RestClientException;
use UCRM\REST\Exceptions\RestObjectException;

/**
 * Trait ServiceDeviceHelper
 * @package UCRM\REST\Endpoints\Helpers
 */
trait ServiceDeviceHelper
{
    use Common\ServiceHelpers;
    use Common\VendorHelpers;

    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------


    public static function create(Service $service, DeviceInterface $deviceInterface, Vendor $vendor, string $ip)
    {
        $serviceDevice = (new ServiceDevice())
            ->setServiceId($service->getId())
            // REQUIRED
            ->setInterfaceId($deviceInterface->getId())
            ->setSendPingNotifications(false)
            ->setCreatePingStatistics(false)
            ->setCreateSignalStatistics(false)
            ->setQosEnabled(ServiceDevice::QOS_ENABLED_NO)
            ->setVendorId($vendor->getId())
            ->setIpRange([$ip]);




        return $serviceDevice;
    }

    /**
     * @return ServiceDevice
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws RestObjectException
     * @throws \ReflectionException
     */
    public function insert(): ServiceDevice
    {
        /** @var Endpoint $data */
        $data = $this;

        /** @var ServiceDevice $serviceDevice */
        $serviceDevice = ServiceDevice::post($data, ["serviceId" => $this->serviceId]);

        return $serviceDevice;
    }

    /**
     * @return ServiceDevice
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws RestObjectException
     * @throws \ReflectionException
     */
    public function update(): ServiceDevice
    {
        /** @var Endpoint $data */
        $data = $this;

        /** @var ServiceDevice $serviceDevice */
        $serviceDevice = ServiceDevice::patch($data, [ "id" => $this->getId() ]);

        return $serviceDevice;
    }

    // -----------------------------------------------------------------------------------------------------------------


    public static function getByService(Service $service): ServiceDeviceCollection
    {
        $serviceDevices = ServiceDevice::get("", [ "serviceId" => $service->getId() ]);

        return new ServiceDeviceCollection($serviceDevices->elements());
    }


}