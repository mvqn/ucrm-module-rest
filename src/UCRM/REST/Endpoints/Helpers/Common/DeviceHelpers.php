<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use MVQN\Annotations\Exceptions\AnnotationReaderException;
//use MVQN\Collections\Exceptions\CollectionException;
use MVQN\Helpers\Exceptions\ArrayHelperException;
use MVQN\Helpers\Exceptions\PatternMatchException;

use UCRM\REST\Endpoints\Exceptions\EndpointException;
use UCRM\REST\Exceptions\RestClientException;

use UCRM\REST\Endpoints\Device;

/**
 * Trait DeviceHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait DeviceHelpers
{
    // =================================================================================================================
    // COMMON HELPERS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Device|null
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
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
