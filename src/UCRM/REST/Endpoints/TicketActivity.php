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
 * Class TicketActivity
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @deprecated NOT FULLY IMPLEMENTED!
 *
 * @Endpoint { "get": "/ticketing/tickets/activities", "getById": "/ticketing/ticket/activities/:id" }
 * @Endpoint { "post": "/ticketing/tickets/activities" }
 * @Endpoint { "patch": "/ticketing/tickets/activities/:id" }
 * @Endpoint { "delete": "/ticketing/tickets/activities/:id" }
 *
 * @method string|null getTitle()
 * @method TicketActivity setTitle(string $title)
 *
 *
 */
final class TicketActivity extends EndpointObject
{
    //use PaymentHelper;

    // =================================================================================================================
    // ENUMS
    // -----------------------------------------------------------------------------------------------------------------

    public const TYPE_COMMENT           = "comment";
    public const TYPE_ASSIGNMENT        = "assignment";
    public const TYPE_ASSIGNMENT_CLIENT = "assignment_client";
    public const TYPE_STATUS_CHANGE     = "status_change";

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @PostRequired
     * @PatchRequired
     */
    protected $userId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $createdAt;

    /**
     * @param \DateTime $value
     * @return TicketActivity
     */
    public function setCreatedAt(\DateTime $value): TicketActivity
    {
        $this->createdAt = $value->format("c");
        return $this;
    }

    /**
     * @var bool
     * @Post
     * @Patch
     */
    protected $public;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $ticketId;



}
