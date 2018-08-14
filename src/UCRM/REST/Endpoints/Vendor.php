<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

/**
 * Class Vendor
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/vendors", "getById": "/vendors/:id" }
 */
final class Vendor extends Endpoint
{
    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $name;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

}
