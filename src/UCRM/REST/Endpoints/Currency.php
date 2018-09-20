<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;

/**
 * Class Currency
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Cached
 *
 * @Endpoint { "get": "/currencies", "getById": "/currencies/:id" }
 *
 * @method string|null getName()
 * @method string|null getCode()
 * @method string|null getSymbol()
 *
 */
final class Currency extends EndpointObject
{
    use Helpers\CurrencyHelper;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $symbol;

}
