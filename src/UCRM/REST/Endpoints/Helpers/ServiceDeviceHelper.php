<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

// Core
use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\CollectionException;
use MVQN\Common\ArraysException;
use MVQN\Common\PatternsException;

// Exceptions
use UCRM\REST\RestClientException;

// Collections
use UCRM\REST\Endpoints\Collections\ServiceDeviceCollection;

// Endpoints
use UCRM\REST\Endpoints\DeviceInterface;
use UCRM\REST\Endpoints\EndpointException;
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
    // OBJECT METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param Service $service
     * @param DeviceInterface $deviceInterface
     * @param Vendor $vendor
     * @param string $ip
     * @return ServiceDevice
     */
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

    // =================================================================================================================
    // READ METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param Service $service
     * @return ServiceDeviceCollection
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function getByService(Service $service): ServiceDeviceCollection
    {
        $serviceDevices = ServiceDevice::get("", [ "serviceId" => $service->getId() ]);

        return new ServiceDeviceCollection($serviceDevices->elements());
    }

    // =================================================================================================================
    // UPDATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // DELETE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // EXTRA FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------

}