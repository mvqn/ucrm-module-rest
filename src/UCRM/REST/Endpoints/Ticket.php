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
 * Class Ticket
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @deprecated NOT FULLY IMPLEMENTED!
 *
 * @Endpoint { "get": "/ticketing/tickets", "getById": "/ticketing/tickets/:id" }
 * @Endpoint { "post": "/ticketing/tickets" }
 * @Endpoint { "patch": "/ticketing/tickets/:id" }
 * @Endpoint { "delete": "/ticketing/tickets/:id" }
 *
 * @method string|null getTitle()
 * @method Ticket setTitle(string $title)
 *
 *
 */
final class Ticket extends EndpointObject
{
    //use PaymentHelper;

    // =================================================================================================================
    // ENUMS
    // -----------------------------------------------------------------------------------------------------------------

    public const STATUS_NEW     = 0;
    public const STATUS_OPEN    = 1;
    public const STATUS_PENDING = 2;
    public const STATUS_SOLVED  = 3;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @PostRequired
     * @PatchRequired
     */
    protected $subject;

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
    protected $emailFromAddress;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $emailFromName;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $assignedGroupId;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $assignedUserId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $createdAt;

    /**
     * @param \DateTime $value
     * @return Ticket
     */
    public function setCreatedAt(\DateTime $value): Ticket
    {
        $this->createdAt = $value->format("c");
        return $this;
    }

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $status;

    /**
     * @var bool
     * @Post
     * @Patch
     */
    protected $public;

    /**
     * @var int[]
     * @Post
     * @Patch
     */
    protected $assignedJobIds;

    /**
     * @var string
     */
    protected $lastActivity;

    /**
     * @var string
     */
    protected $lastCommentAt;

    /**
     * @var string
     */
    protected $isLastActivityByClient;


    /**
     * @var TicketActivity[]
     * @PostRequired
     * @Patch
     */
    protected $activity;

}
