<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

/**
 * Class Version
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/version" }
 * @excludeId
 * @singular
 */
final class Version extends Endpoint
{

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $version;

    /**
     * @return string|null
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

}
