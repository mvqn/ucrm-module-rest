<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;
use MVQN\REST\Annotations\PostRequiredAnnotation as PostRequired;

/**
 * Class ServiceIP
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/clients/services/service-devices/:serviceDeviceId/service-ips" }
 * @Endpoint { "getById": "/clients/services/service-devices/service-ips/:id" }
 * @Endpoint { "post": "/clients/services/service-devices/:serviceDeviceId/service-ips" }
 * @Endpoint { "delete": "/clients/services/service-devices/service-ips/:id" }
 *
 * @method int|null getServiceDeviceId()
 * @method ServiceIP setServiceDeviceId(int $id)
 * @method string|null getIpRange()
 * @method ServiceIP setIpRange(string $range)
 *
 */
final class ServiceIP extends EndpointObject
{

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $serviceDeviceId;

    /**
     * @var string
     * @PostRequired
     */
    protected $ipRange;

}
