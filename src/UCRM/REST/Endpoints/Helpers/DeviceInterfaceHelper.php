<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\Exceptions\AnnotationReaderException;
use MVQN\Collections\Exceptions\CollectionException;
use MVQN\Helpers\Exceptions\ArrayHelperException;
use MVQN\Helpers\Exceptions\PatternMatchException;

use UCRM\REST\Endpoints\Exceptions\EndpointException;
use UCRM\REST\Exceptions\RestClientException;

use UCRM\REST\Endpoints\Collections\DeviceInterfaceCollection;
use UCRM\REST\Endpoints\Device;
use UCRM\REST\Endpoints\DeviceInterface;

trait DeviceInterfaceHelper
{
    use Common\DeviceHelpers;

    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------


    /**
     * @param Device $device
     * @return DeviceInterfaceCollection
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function getByDevice(Device $device): DeviceInterfaceCollection
    {
        $devicesInterfaces = DeviceInterface::get("", [ "deviceId" => $device->getId() ]);

        return new DeviceInterfaceCollection($devicesInterfaces->elements());
    }


}