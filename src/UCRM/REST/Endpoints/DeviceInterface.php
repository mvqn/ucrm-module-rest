<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

/**
 * Class DeviceInterface
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/devices/:deviceId/device-interfaces", "getById": "/devices/device-interfaces/:id" }
 */
final class DeviceInterface extends Endpoint
{

    // =================================================================================================================
    // ENUMS
    // -----------------------------------------------------------------------------------------------------------------

    public const TYPE_UNKNOWN                               = 0;
    public const TYPE_WIRELESS                              = 1;
    public const TYPE_ETHERNET                              = 2;
    public const TYPE_VLAN                                  = 3;
    public const TYPE_MESH                                  = 4;
    public const TYPE_BONDING                               = 5;
    public const TYPE_BRIDGE                                = 6;
    public const TYPE_CAP                                   = 7;
    public const TYPE_GRE                                   = 8;
    public const TYPE_GRE6                                  = 9;
    public const TYPE_L2TP                                  = 10;
    public const TYPE_OVPN                                  = 11;
    public const TYPE_PPPOE                                 = 12;
    public const TYPE_PPTP                                  = 13;
    public const TYPE_SSTP                                  = 14;
    public const TYPE_VPLS                                  = 15;
    public const TYPE_TRAFFIC_ENG                           = 16;
    public const TYPE_VRRP                                  = 17;
    public const TYPE_WDS                                   = 18;

    public const POLARIZATION_VERTICAL                      = 1;
    public const POLARIZATION_HORIZONTAL                    = 2;
    public const POLARIZATION_BOTH                          = 3;

    public const ENCRYPTION_NONE                            = 0;
    public const ENCRYPTION_WEP                             = 1;
    public const ENCRYPTION_WPA                             = 2;
    public const ENCRYPTION_WPA2EAP                         = 3;
    public const ENCRYPTION_WPAEAP                          = 4;
    public const ENCRYPTION_WPAEAP_WPA2EAP                  = 5;
    public const ENCRYPTION_WPA2PSK                         = 6;
    public const ENCRYPTION_WPA2PSK_WPA2EAP                 = 7;
    public const ENCRYPTION_WPA2PSK_WPAEAP                  = 8;
    public const ENCRYPTION_WPA2PSK_WPAEAP_WPA2EAP          = 9;
    public const ENCRYPTION_WPAPSK                          = 10;
    public const ENCRYPTION_WPAPSK_WPA2EAP                  = 11;
    public const ENCRYPTION_WPAPSK_WPAEAP                   = 12;
    public const ENCRYPTION_WPAPSK_WPAEAP_WPA2EAP           = 13;
    public const ENCRYPTION_WPAPSK_WPA2PSK                  = 14;
    public const ENCRYPTION_WPAPSK_WPA2PSK_WPA2EAP          = 15;
    public const ENCRYPTION_WPAPSK_WPA2PSK_WPAEAP           = 16;
    public const ENCRYPTION_WPAPSK_WPA2PSK_WPAEAP_WPA2EAP   = 17;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $deviceId;

    /**
     * @return int|null
     */
    public function getDeviceId(): ?int
    {
        return $this->deviceId;
    }

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
    protected $type;

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $macAddress;

    /**
     * @return string|null
     */
    public function getMacAddress(): ?string
    {
        return $this->macAddress;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     */
    protected $allowClientConnection;

    /**
     * @return bool|null
     */
    public function getAllowClientConnection(): ?bool
    {
        return $this->allowClientConnection;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     */
    protected $enabled;

    /**
     * @return bool|null
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
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
    protected $ssid;

    /**
     * @return string|null
     */
    public function getSsid(): ?string
    {
        return $this->ssid;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $frequency;

    /**
     * @return int|null
     */
    public function getFrequency(): ?int
    {
        return $this->frequency;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $polarization;

    /**
     * @return int|null
     */
    public function getPolarization(): ?int
    {
        return $this->polarization;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $encryptionType;

    /**
     * @return int|null
     */
    public function getEncryptionType(): ?int
    {
        return $this->encryptionType;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $encryptionKeyWpa;

    /**
     * @return string|null
     */
    public function getEncryptionKeyWpa(): ?string
    {
        return $this->encryptionKeyWpa;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $encryptionKeyWpa2;

    /**
     * @return string|null
     */
    public function getEncryptionKeyWpa2(): ?string
    {
        return $this->encryptionKeyWpa2;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string[]
     */
    protected $ipRanges;

    /**
     * @return string[]|null
     */
    public function getIpRanges(): ?array
    {
        return $this->ipRanges;
    }

}
