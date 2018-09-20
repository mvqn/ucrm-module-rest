<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use UCRM\REST\Endpoints\Helpers\WebhookEventHelper;

/**
 * Class WebhookEvent
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @method string|null getUuid()
 * @method string|null getChangeType()
 * @method string|null getEntity()
 * @method int|null getEntityId()
 *
 */
final class WebhookEvent extends EndpointObject
{
    use WebhookEventHelper;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $changeType;

    /**
     * @var string
     */
    protected $entity;

    /**
     * @var int
     */
    protected $entityId;

}
