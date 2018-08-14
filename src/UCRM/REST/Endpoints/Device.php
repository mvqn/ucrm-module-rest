<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Helpers\DeviceHelper;

/**
 * Class Device
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/devices", "getById": "/devices/:id" }
 */
final class Device extends Endpoint
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
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $siteId;

    /**
     * @return int|null
     */
    public function getSiteId(): ?int
    {
        return $this->siteId;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $vendorId;

    /**
     * @return int|null
     */
    public function getVendorId(): ?int
    {
        return $this->vendorId;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $modelName;

    /**
     * @return string|null
     */
    public function getModelName(): ?string
    {
        return $this->modelName;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int[]
     */
    protected $parentIds;

    /**
     * @return int[]|null
     */
    public function getParentIds(): ?array
    {
        return $this->parentIds;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $notes;

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $loginUsername;

    /**
     * @return string|null
     */
    public function getLoginUsername(): ?string
    {
        return $this->loginUsername;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $sshPort;

    /**
     * @return int|null
     */
    public function getSshPort(): ?int
    {
        return $this->sshPort;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $snmpCommunity;

    /**
     * @return string|null
     */
    public function getSnmpCommunity(): ?string
    {
        return $this->snmpCommunity;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $osVersion;

    /**
     * @return string|null
     */
    public function getOsVersion(): ?string
    {
        return $this->osVersion;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     */
    protected $isGateway;

    /**
     * @return bool|null
     */
    public function getIsGateway(): ?bool
    {
        return $this->isGateway;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     */
    protected $isSuspendEnabled;

    /**
     * @return bool|null
     */
    public function getIsSuspendEnabled(): ?bool
    {
        return $this->isSuspendEnabled;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     */
    protected $sendPingNotifications;

    /**
     * @return bool|null
     */
    public function getSendPingNotifications(): ?bool
    {
        return $this->sendPingNotifications;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $pingNotificationUserId;

    /**
     * @return int|null
     */
    public function getPingNotificationUserId(): ?int
    {
        return $this->pingNotificationUserId;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     */
    protected $createSignalStatistics;

    /**
     * @return bool|null
     */
    public function getCreateSignalStatistics(): ?bool
    {
        return $this->createSignalStatistics;
    }

}
