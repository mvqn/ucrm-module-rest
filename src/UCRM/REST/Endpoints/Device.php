<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;

use UCRM\REST\Endpoints\Helpers\DeviceHelper;

/**
 * Class Device
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/devices", "getById": "/devices/:id" }
 *
 * @method string|null getName()
 * @method int|null getSiteId()
 * @method int|null getVendorId()
 * @method string|null getModelName()
 * @method int[]|null getParentIds()
 * @method string|null getNotes()
 * @method string|null getLoginUsername()
 * @method int|null getSshPort()
 * @method string|null getSnmpCommunity()
 * @method string|null getOsVersion()
 * @method bool|null getIsGateway()
 * @method bool|null getIsSuspendEnabled()
 * @method bool|null getSendPingNotifications()
 * @method int|null getPingNotificationUserId()
 * @method bool|null getCreateSignalStatistics()
 *
 */
final class Device extends EndpointObject
{
    use DeviceHelper;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $siteId;

    /**
     * @var int
     */
    protected $vendorId;

    /**
     * @var string
     */
    protected $modelName;

    /**
     * @var int[]
     */
    protected $parentIds;

    /**
     * @var string
     */
    protected $notes;

    /**
     * @var string
     */
    protected $loginUsername;

    /**
     * @var int
     */
    protected $sshPort;

    /**
     * @var string
     */
    protected $snmpCommunity;

    /**
     * @var string
     */
    protected $osVersion;

    /**
     * @var bool
     */
    protected $isGateway;

    /**
     * @var bool
     */
    protected $isSuspendEnabled;

    /**
     * @var bool
     */
    protected $sendPingNotifications;

    /**
     * @var int
     */
    protected $pingNotificationUserId;

    /**
     * @var bool
     */
    protected $createSignalStatistics;

}
