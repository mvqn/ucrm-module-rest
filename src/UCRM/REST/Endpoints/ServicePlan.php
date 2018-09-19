<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;

use UCRM\REST\Endpoints\Collections\ServicePlanPeriodCollection;
use UCRM\REST\Endpoints\Helpers\ServicePlanHelper;
use UCRM\REST\Endpoints\Lookups\ServicePlanPeriod;

/**
 * Class ServicePlan
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/service-plans", "getById": "/service-plans/:id" }
 * @Endpoint { "post": "/service-plans" }
 * @Endpoint { "patch": "/service-plans" }
 *
 * @method string|null getName()
 * @method ServicePlan setName(string $name)
 *
 * @method int|null getOrganizationId()
 * @method ServicePlan setOrganizationId(int $id)
 *
 * @method string|null getInvoiceLabel()
 * @method ServicePlan setInvoiceLabel(string $label)
 *
 * @method float|null getDownloadBurst()
 * @method ServicePlan setDownloadBurst(float $burst)
 *
 * @method float|null getUploadBurst()
 * @method ServicePlan setUploadBurst(float $burst)
 *
 * @method float|null getDownloadSpeed()
 * @method ServicePlan setDownloadSpeed(float $speed)
 *
 * @method float|null getUploadSpeed()
 * @method ServicePlan setUploadSpeed(float $speed)
 *
 * @method int|null getDataUsageLimit()
 * @method ServicePlan setDataUsageLimit(int $limit)
 *
 * @method bool|null getTaxable()
 * @method ServicePlan setTaxable(bool $taxable)
 *
 * @method ServicePlanPeriod[]|null getPeriods()
 * @method ServicePlan setPeriods(ServicePlanPeriodCollection $taxable)
 *
 */
final class ServicePlan extends EndpointObject
{
    use ServicePlanHelper;

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
     * @var int
     * @Post
     * @Patch
     */
    protected $organizationId;

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
    protected $downloadBurst;

    /**
     * @var float
     * @Post
     * @Patch
     */
    protected $uploadBurst;

    /**
     * @var float
     * @Post
     * @Patch
     */
    protected $downloadSpeed;

    /**
     * @var float
     * @Post
     * @Patch
     */
    protected $uploadSpeed;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $dataUsageLimit;

    /**
     * @var bool
     * @Post
     * @Patch
     */
    protected $taxable;

    /**
     * @var ServicePlanPeriod[] $periods
     * @Post
     * @Patch
     */
    protected $periods;

}
