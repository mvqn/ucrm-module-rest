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
 */
final class Version extends Endpoint
{
    // -----------------------------------------------------------------------------------------------------------------

    /** @var string  */
    protected $version;

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

}



