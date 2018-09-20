<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;

use UCRM\REST\Endpoints\Helpers\InvoiceTemplateHelper;

/**
 * Class InvoiceTemplate
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/invoice-templates", "getById": "/invoice-templates/:id" }
 *
 * @method string|null getName()
 * @method string|null getCreatedDate()
 * @method bool|null getIsOfficial()
 * @method bool|null getIsValid()
 *
 */
final class InvoiceTemplate extends EndpointObject
{
    use InvoiceTemplateHelper;

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
