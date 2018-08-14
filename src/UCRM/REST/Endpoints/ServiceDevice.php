<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Helpers\ServiceDeviceHelper;

/**
 * Class ServiceDevice
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/clients/services/:serviceId/service-devices" }
 * @endpoints { "getById": "/clients/services/service-devices/:id" }
 * @endpoints { "post": "/clients/services/:serviceId/service-devices" }
 * @endpoints { "patch": "/clients/services/service-devices/:id" }
 */
final class ServiceDevice extends Endpoint
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
     * @return int|null
     */
    public function getServiceId(): ?int
    {
        return $this->serviceId;
    }

    /**
     * @param int $value
     * @return ServiceDevice
     */
    public function setServiceId(int $value): ServiceDevice
    {
        $this->serviceId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post-required
     */
    protected $interfaceId;

    /**
     * @return int|null
     */
    public function getInterfaceId(): ?int
    {
        return $this->interfaceId;
    }

    /**
     * @param int $value
     * @return ServiceDevice
     */
    public function setInterfaceId(int $value): ServiceDevice
    {
        $this->interfaceId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post-required
     */
    protected $vendorId;

    /**
     * @return int|null
     */
    public function getVendorId(): ?int
    {
        return $this->vendorId;
    }

    /**
     * @param int $value
     * @return ServiceDevice
     */
    public function setVendorId(int $value): ServiceDevice
    {
        $this->vendorId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string[]
     * @post-required
     */
    protected $ipRange;

    /**
     * @return string[]|null
     */
    public function getIpRange(): ?array
    {
        return $this->ipRange;
    }

    /**
     * @param string[] $value
     * @return ServiceDevice
     */
    public function setIpRange(array $value): ServiceDevice
    {
        $this->ipRange = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     */
    protected $macAddress;

    /**
     * @return string|null
     */
    public function getMacAddress(): ?string
    {
        return $this->macAddress;
    }

    /**
     * @param string $value
     * @return ServiceDevice
     */
    public function setMacAddress(string $value): ServiceDevice
    {
        $this->macAddress = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     */
    protected $loginUsername;

    /**
     * @return string|null
     */
    public function getLoginUsername(): ?string
    {
        return $this->loginUsername;
    }

    /**
     * @param string $value
     * @return ServiceDevice
     */
    public function setLoginUsername(string $value): ServiceDevice
    {
        $this->loginUsername = $value;
        return $this;
    }

// -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     */
    protected $sshPort;

    /**
     * @return int|null
     */
    public function getSshPort(): ?int
    {
        return $this->sshPort;
    }

    /**
     * @param int $value
     * @return ServiceDevice
     */
    public function setSshPort(int $value): ServiceDevice
    {
        $this->sshPort = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     * @post
     */
    protected $sendPingNotifications;

    /**
     * @return bool|null
     */
    public function getSendPingNotifications(): ?bool
    {
        return $this->sendPingNotifications;
    }

    /**
     * @param bool $value
     * @return ServiceDevice
     */
    public function setSendPingNotifications(bool $value): ServiceDevice
    {
        $this->sendPingNotifications = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     */
    protected $pingNotificationUserId;

    /**
     * @return int|null
     */
    public function getPingNotificationUserId(): ?int
    {
        return $this->pingNotificationUserId;
    }

    /**
     * @param int $value
     * @return ServiceDevice
     */
    public function setPingNotificationUserId(int $value): ServiceDevice
    {
        $this->pingNotificationUserId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     * @post
     */
    protected $createPingStatistics;

    /**
     * @return bool|null
     */
    public function getCreatePingStatistics(): ?bool
    {
        return $this->createPingStatistics;
    }

    /**
     * @param bool $value
     * @return ServiceDevice
     */
    public function setCreatePingStatistics(bool $value): ServiceDevice
    {
        $this->createPingStatistics = $value;
        return $this;
    }

// -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     * @post
     */
    protected $createSignalStatistics;

    /**
     * @return bool|null
     */
    public function getCreateSignalStatistics(): ?bool
    {
        return $this->createSignalStatistics;
    }

    /**
     * @param bool $value
     * @return ServiceDevice
     */
    public function setCreateSignalStatistics(bool $value): ServiceDevice
    {
        $this->createSignalStatistics = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     */
    protected $qosEnabled;

    /**
     * @return int|null
     */
    public function getQosEnabled(): ?int
    {
        return $this->qosEnabled;
    }

    /**
     * @param int $value
     * @return ServiceDevice
     */
    public function setQosEnabled(int $value): ServiceDevice
    {
        $this->qosEnabled = $value;
        return $this;
    }

// -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int[]
     * @post
     */
    protected $qosDeviceIds;

    /**
     * @return int[]|null
     */
    public function getQosDeviceIds(): ?array
    {
        return $this->qosDeviceIds;
    }

    /**
     * @param int[] $value
     * @return ServiceDevice
     */
    public function setQosDeviceIds(array $value): ServiceDevice
    {
        $this->qosDeviceIds = $value;
        return $this;
    }

// -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     */
    protected $loginPassword;

    /**
     * @return string|null
     */
    public function getLoginPassword(): ?string
    {
        return $this->loginPassword;
    }

    /**
     * @param string $value
     * @return ServiceDevice
     */
    public function setLoginPassword(string $value): ServiceDevice
    {
        $this->loginPassword = $value;
        return $this;
    }

}
