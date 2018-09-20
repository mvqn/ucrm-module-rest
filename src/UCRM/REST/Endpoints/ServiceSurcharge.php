<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;
use MVQN\REST\Annotations\PostAnnotation as Post;
use MVQN\REST\Annotations\PostRequiredAnnotation as PostRequired;
use MVQN\REST\Annotations\PatchAnnotation as Patch;
use MVQN\REST\Annotations\PatchRequiredAnnotation as PatchRequired;

use UCRM\REST\Endpoints\Helpers\ServiceSurchargeHelper;

/**
 * Class ServiceSurcharge
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/clients/services/:serviceId/service-surcharges" }
 * @Endpoint { "getById": "/clients/services/service-surcharges/:id" }
 * @Endpoint { "post": "/clients/services/:serviceId/service-surcharges" }
 * @Endpoint { "patch": "/clients/services/service-surcharges/:id" }
 *
 * @method int|null getServiceId()
 * @method ServiceSurcharge setServiceId(int $id)
 * @method int|null getSurchargeId()
 * @method ServiceSurcharge setSurchargeId(int $id)
 * @method string|null getInvoiceLabel()
 * @method ServiceSurcharge setInvoiceLabel(string $label)
 * @method float|null getPrice()
 * @method ServiceSurcharge setPrice(float $price)
 * @method bool|null getTaxable()
 * @method ServiceSurcharge setTaxable(bool $taxable)
 *
 */
final class ServiceSurcharge extends EndpointObject
{
    use ServiceSurchargeHelper;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     */
    protected $serviceId;

    /**
     * @var int
     * @PostRequired
     * @PatchRequired
     */
    protected $surchargeId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $invoiceLabel;

    /**
     * @var float
     * @Post
     * @Patch
     */
    protected $price;

    /**
     * @var bool
     * @Post
     * @Patch
     */
    protected $taxable;

}
