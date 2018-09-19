<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;
use MVQN\REST\Annotations\ExcludeIdAnnotation as ExcludeId;

/**
 * Class Version
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/version" }
 * @ExcludeId
 *
 * @method string|null getVersion()
 *
 */
final class Version extends EndpointObject
{
    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $version;

}
