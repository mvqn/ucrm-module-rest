<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;

use UCRM\REST\Endpoints\Helpers\QuoteTemplateHelper;

/**
 * Class QuoteTemplate
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/quote-templates", "getById": "/quote-templates/:id" }
 *
 * @method string|null getName()
 * @method string|null getCreatedDate()
 * @method bool|null getIsOfficial()
 * @method bool|null getIsValid()
 *
 */
final class QuoteTemplate extends EndpointObject
{
    use QuoteTemplateHelper;

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
    protected $createdDate;

    /**
     * @var bool
     */
    protected $isOfficial;

    /**
     * @var bool
     */
    protected $isValid;

}
