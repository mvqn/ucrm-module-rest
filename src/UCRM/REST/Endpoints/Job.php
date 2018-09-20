<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;
use MVQN\REST\Annotations\PostAnnotation as Post;
use MVQN\REST\Annotations\PostRequiredAnnotation as PostRequired;
use MVQN\REST\Annotations\PatchAnnotation as Patch;
use MVQN\REST\Annotations\PatchRequiredAnnotation as PatchRequired;

//use UCRM\REST\Endpoints\Helpers\PaymentHelper;
//use UCRM\REST\Endpoints\Lookups\PaymentCover;

/**
 * Class Job
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/scheduling/jobs", "getById": "/scheduling/jobs/:id" }
 * @Endpoint { "post": "/scheduling/jobs" }
 * @Endpoint { "patch": "/scheduling/jobs/:id" }
 * @Endpoint { "delete": "/scheduling/jobs/:id" }
 *
 * @method string|null getTitle()
 * @method Job setTitle(string $title)
 * @method string|null getDescription()
 * @method Job setDescription(string $description)
 * @method int|null getAssignedUserId()
 * @method Job setAssignedUserId(int $id)
 * @method int|null getClientId()
 * @method Job setClientId(int $id)
 * @method string|null getDate()
 * @see Job::setDate()
 * @method int|null getDuration()
 * @method Job setDuration(int $minutes)
 * @method int|null getStatus()
 * @method Job setStatus(int $status)
 * @method string|null getAddress()
 * @method Job setAddress(string $address)
 * @method string|null getGpsLat()
 * @method Job setGpsLat(string $latitude)
 * @method string|null getGpsLon()
 * @method Job setGpsLon(string $longitude)
 *
 */
final class Job extends EndpointObject
{
    //use PaymentHelper;

    // =================================================================================================================
    // ENUMS
    // -----------------------------------------------------------------------------------------------------------------

    public const STATUS_OPEN        = 0;
    public const STATUS_IN_PROGRESS = 1;
    public const STATUS_CLOSED      = 2;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @PostRequired
     * @PatchRequired
     */
    protected $title;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $description;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $assignedUserId;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $clientId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $date;

    /**
     * @param \DateTime $value
     * @return Job
     */
    public function setDate(\DateTime $value): Job
    {
        $this->date = $value->format("c");
        return $this;
    }

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $duration;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $status;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $address;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $gpsLat;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $gpsLon;

}
