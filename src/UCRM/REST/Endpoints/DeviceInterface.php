<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;

/**
 * Class DeviceInterface
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/devices/:deviceId/device-interfaces", "getById": "/devices/device-interfaces/:id" }
 *
 * @method int|null getDeviceId()
 * @method string|null getName()
 * @method int|null getType()
 * @method string|null getMacAddress()
 * @method bool|null getAllowClientConnection()
 * @method bool|null getEnabled()
 * @method string|null getNotes()
 * @method string|null getSsid()
 * @method int|null getFrequency()
 * @method int|null getPolarization()
 * @method int|null getEncryptionType()
 * @method string|null getEncryptionKeyWpa()
 * @method string|null getEncryptionKeyWpa2()
 * @method string[]|null getIpRanges()
 *
 */
final class DeviceInterface extends EndpointObject
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
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $type;

    /**
     * @var string
     */
    protected $macAddress;

    /**
     * @var bool
     */
    protected $allowClientConnection;

    /**
     * @var bool
     */
    protected $enabled;

    /**
     * @var string
     */
    protected $notes;

    /**
     * @var string
     */
    protected $ssid;

    /**
     * @var int
     */
    protected $frequency;

    /**
     * @var int
     */
    protected $polarization;

    /**
     * @var int
     */
    protected $encryptionType;

    /**
     * @var string
     */
    protected $encryptionKeyWpa;

    /**
     * @var string
     */
    protected $encryptionKeyWpa2;

    /**
     * @var string[]
     */
    protected $ipRanges;

}
