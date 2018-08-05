<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;



/**
 * Class Version
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class Version extends Endpoint
{
    /** @const string  */
    protected const ENDPOINT = "/version";



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



