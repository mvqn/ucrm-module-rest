<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use UCRM\REST\Endpoints\Collections\DeviceInterfaceCollection;
use UCRM\REST\Endpoints\Device;
use UCRM\REST\Endpoints\DeviceInterface;

trait DeviceInterfaceHelper
{
    use Common\DeviceHelpers;

    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------




    public function getByDevice(Device $device): DeviceInterfaceCollection
    {
        $devicesInterfaces = DeviceInterface::get("", [ "deviceId" => $device->getId() ]);

        return new DeviceInterfaceCollection($devicesInterfaces->elements());
    }


}