<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;
use MVQN\REST\Annotations\PostAnnotation as Post;
use MVQN\REST\Annotations\PostRequiredAnnotation as PostRequired;
use MVQN\REST\Annotations\PatchAnnotation as Patch;
use MVQN\REST\Annotations\PatchRequiredAnnotation as PatchRequired;

use UCRM\REST\Endpoints\Helpers\ServiceDeviceHelper;

/**
 * Class ServiceDevice
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/clients/services/:serviceId/service-devices" }
 * @Endpoint { "getById": "/clients/services/service-devices/:id" }
 * @Endpoint { "post": "/clients/services/:serviceId/service-devices" }
 * @Endpoint { "patch": "/clients/services/service-devices/:id" }
 *
 * @method int|null getServiceId()
 * @method ServiceDevice setServiceId(int $id)
 * @method int|null getInterfaceId()
 * @method ServiceDevice setInterfaceId(int $id)
 * @method int|null getVendorId()
 * @method ServiceDevice setVendorId(int $id)
 * @method string[]|null getIpRange()
 * @method ServiceDevice setIpRange(array $range)
 * @method string|null getMacAddress()
 * @method ServiceDevice setMacAddress(string $address)
 * @method string|null getLoginUsername()
 * @method ServiceDevice setLoginUsername(string $username)
 * @method string|null getLoginPassword()
 * @method ServiceDevice setLoginPassword(string $password)
 * @method int|null getSshPort()
 * @method ServiceDevice setSshPort(int $port)
 * @method bool|null getSendPingNotifications()
 * @method ServiceDevice setSendPingNotifications(bool $notifications)
 * @method int|null getPingNotificationUserId()
 * @method ServiceDevice setPingNotificationUserId(int $id)
 * @method bool|null getCreatePingStatistics()
 * @method ServiceDevice setCreatePingStatistics(bool $statistics)
 * @method bool|null getCreateSignalStatistics()
 * @method ServiceDevice setCreateSignalStatistics(bool $statistics)
 * @method int|null getQosEnabled()
 * @method ServiceDevice setQosEnabled(int $enabled)
 * @method int[]|null getQosDeviceIds()
 * @method ServiceDevice setQosDeviceIds(array $ids)
 *
 */
final class ServiceDevice extends EndpointObject
{
    use ServiceDeviceHelper;

    // =================================================================================================================
    // ENUMS
    // -----------------------------------------------------------------------------------------------------------------

    public const QOS_ENABLED_NO                 = 0;
    public const QOS_ENABLED_ON_THIS_DEVICE     = 1;
    public const QOS_ENABLED_ON_ANOTHER_DEVICE  = 2;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $serviceId;

    /**
     * @var int
     * @PostRequired
     * @PatchRequired
     */
    protected $interfaceId;

    /**
     * @var int
     * @PostRequired
     * @PatchRequired
     */
    protected $vendorId;

    /**
     * @var string[]
     * @PostRequired
     * @PatchRequired
     */
    protected $ipRange;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $macAddress;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $loginUsername;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $loginPassword;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $sshPort;

    /**
     * @var bool
     * @Post
     * @Patch
     */
    protected $sendPingNotifications;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $pingNotificationUserId;

    /**
     * @var bool
     * @Post
     * @Patch
     */
    protected $createPingStatistics;

    /**
     * @var bool
     * @Post
     * @Patch
     */
    protected $createSignalStatistics;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $qosEnabled;

    /**
     * @var int[]
     * @Post
     * @Patch
     */
    protected $qosDeviceIds;

}
