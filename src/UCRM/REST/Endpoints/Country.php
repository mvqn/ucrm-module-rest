<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\CachedAnnotation as Cached;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;


use UCRM\REST\Endpoints\Helpers\CountryHelper;

/**
 * Class Country
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Cached
 *
 * @Endpoint { "get": "/countries", "getById": "/countries/:id" }
 *
 * @method string|null getName()
 * @method string|null getCode()
 *
 */
final class Country extends EndpointObject
{
    use CountryHelper;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $name;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $code;

}
