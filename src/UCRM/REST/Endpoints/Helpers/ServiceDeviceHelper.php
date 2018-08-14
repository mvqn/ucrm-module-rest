<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use UCRM\REST\Endpoints\Collections\ServiceDeviceCollection;
use UCRM\REST\Endpoints\Device;
use UCRM\REST\Endpoints\DeviceInterface;
use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\Service;
use UCRM\REST\Endpoints\ServiceDevice;
use UCRM\REST\Endpoints\Vendor;

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
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\ArrayHelperException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
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
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\ArrayHelperException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
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