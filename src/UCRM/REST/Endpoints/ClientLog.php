<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;
use MVQN\REST\Annotations\PostAnnotation as Post;
use MVQN\REST\Annotations\PostRequiredAnnotation as PostRequired;
use MVQN\REST\Annotations\PatchAnnotation as Patch;
use MVQN\REST\Annotations\PatchRequiredAnnotation as PatchRequired;

use UCRM\REST\Endpoints\Helpers\ClientLogHelper;


/**
 * Class ClientLog
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/client-logs", "getById": "/client-logs/:id" }
 * @Endpoint { "post": "/client-logs" }
 *
 * @method int|null getClientId()
 * @method ClientLog setClientId(int $id)
 * @method string|null getMessage()
 * @method ClientLog setMessage(string $message)
 * @method int|null getUserId()
 * @method ClientLog setUserId(int $id)
 * @method string|null getCreatedDate()
 * @see ClientLog::setCreatedDate()
 *
 */
final class ClientLog extends EndpointObject
{
    use ClientLogHelper;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @PostRequired
     * @PatchRequired
     *
     */
    protected $clientId;

    /**
     * @var string
     * @PostRequired
     * @PatchRequired
     */
    protected $message;

    /**
     * @var int
     * @Post
     * @Patch
     */
    protected $userId;

    /**
     * @var string
     * @Post
     * @Patch
     */
    protected $createdDate;

    /**
     * @param \DateTime $value
     * @return ClientLog Returns the ClientLog instance, for method chaining purposes.
     */
    public function setCreatedDate(\DateTime $value): ClientLog
    {
        $this->createdDate = $value->format("c");
        return $this;
    }

}
