<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;
use MVQN\REST\Annotations\PostAnnotation as Post;
use MVQN\REST\Annotations\PostRequiredAnnotation as PostRequired;
use MVQN\REST\Annotations\PatchAnnotation as Patch;
use MVQN\REST\Annotations\PatchRequiredAnnotation as PatchRequired;

use UCRM\REST\Endpoints\Helpers\SurchargeHelper;

/**
 * Class Surcharge
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/surcharges", "getById": "/surcharges/:id" }
 * @Endpoint { "post": "/surcharges" }
 * @Endpoint { "patch": "/surcharges/:id" }
 *
 * @method string|null getName()
 * @method Surcharge setName(string $name)
 * @method string|null getInvoiceLabel()
 * @method Surcharge setInvoiceLabel(string $label)
 * @method float|null getPrice()
 * @method Surcharge setPrice(float $price)
 * @method bool|null getTaxable()
 * @method Surcharge setTaxable(bool $taxable)
 *
 */
final class Surcharge extends EndpointObject
{
    use SurchargeHelper;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @PostRequired
     * @PatchRequired
     */
    protected $name;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $invoiceLabel;

    /**
     * @var float
     * @PostRequired
     * @PatchRequired
     */
    protected $price;

    /**
     * @var bool
     * @Post
     * @Patch
     */
    protected $taxable;

}
