<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Device;

/**
 * Trait DeviceHelpers
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait DeviceHelpers
{
    // =================================================================================================================
    // COMMON HELPERS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return null|Device
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\ArrayHelperException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getDevice(): ?Device
    {
        if(property_exists($this, "deviceId") && $this->{"deviceId"} !== null)
            $device = Device::getById($this->{"deviceId"});

        /** @var Device $device */
        return $device;
    }

    /**
     * @param Device $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setDevice(Device $value): self
    {
        $this->{"deviceId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

}
