<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

/**
 * Class ServiceIP
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/clients/services/service-devices/:serviceDeviceId/service-ips" }
 * @endpoints { "getById": "/clients/services/service-devices/service-ips/:id" }
 * @endpoints { "post": "/clients/services/service-devices/:serviceDeviceId/service-ips" }
 * @endpoints { "delete": "/clients/services/service-devices/service-ips/:id" }
 */
final class ServiceIP extends Endpoint
{

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $serviceDeviceId;

    /**
     * @return int|null
     */
    public function getServiceDeviceId(): ?int
    {
        return $this->serviceDeviceId;
    }

    /**
     * @param int $value
     * @return $this->serviceDeviceIdIP
     */
    public function setServiceDeviceId(int $value): ServiceIP
    {
        $this->serviceDeviceId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post-required
     */
    protected $ipRange;

    /**
     * @return string|null
     */
    public function getIpRange(): ?string
    {
        return $this->ipRange;
    }

    /**
     * @param string $value
     * @return ServiceIP
     */
    public function setIpRange(string $value): ServiceIP
    {
        $this->ipRange = $value;
        return $this;
    }

}
