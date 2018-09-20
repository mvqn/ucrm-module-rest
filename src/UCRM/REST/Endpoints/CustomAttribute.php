<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;
use MVQN\REST\Annotations\PostAnnotation as Post;
use MVQN\REST\Annotations\PatchAnnotation as Patch;

/**
 * Class CustomAttribute
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/custom-attributes", "getById": "/custom-attributes/:id" }
 * @Endpoint { "post": "/custom-attributes" }
 * @Endpoint { "patch": "/custom-attributes/:id" }
 *
 * @method string|null getName()
 * @method CustomAttribute setName(string $name)
 * @method string|null getAttributeType()
 * @method CustomAttribute setAttributeType(string $type)
 * @method string|null getKey()
 *
 */
final class CustomAttribute extends EndpointObject
{
    //use PaymentHelper;

    // =================================================================================================================
    // ENUMS
    // -----------------------------------------------------------------------------------------------------------------

    public const ATTRIBUTE_TYPE_CLIENT  = "client";
    public const ATTRIBUTE_TYPE_INVOICE = "invoice";

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $name;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $attributeType;

    /**
     * @var string
     */
    protected $key;

}
