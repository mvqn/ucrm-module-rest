<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Helpers\CountryHelper;

/**
 * Class Country
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/countries", "getById": "/countries/:id" }
 */
final class Country extends Endpoint
{
    use CountryHelper;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $code;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

}



