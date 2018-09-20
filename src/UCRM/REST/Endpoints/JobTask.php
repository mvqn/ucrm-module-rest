<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;
use MVQN\REST\Annotations\PostAnnotation as Post;
use MVQN\REST\Annotations\PostRequiredAnnotation as PostRequired;
use MVQN\REST\Annotations\PatchAnnotation as Patch;
use MVQN\REST\Annotations\PatchRequiredAnnotation as PatchRequired;

/**
 * Class JobTask
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/scheduling/jobs/tasks", "getById": "/scheduling/jobs/tasks/:id" }
 * @Endpoint { "post": "/scheduling/jobs/tasks" }
 * @Endpoint { "patch": "/scheduling/jobs/tasks/:id" }
 * @Endpoint { "delete": "/scheduling/jobs/tasks/:id" }
 *
 * @method int|null getJobId()
 * @method JobTask setJobId(int $id)
 * @method string|null getLabel()
 * @method JobTask setLabel(string $label)
 * @method bool|null getClosed()
 * @method JobTask setClosed(bool $closed)
 *
 */
final class JobTask extends EndpointObject
{
    //use PaymentHelper;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @PostRequired
     * @PatchRequired
     */
    protected $jobId;

    /**
     * @var string
     * @PostRequired
     * @PatchRequired
     */
    protected $label;

    /**
     * @var bool
     * @Post
     * @Patch
     */
    protected $closed;

}
