<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Service;

/**
 * Trait ServiceHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait ServiceHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Service|null
     * @throws \Exception
     */
    public function getService(): ?Service
    {
        if(property_exists($this, "serviceId") && $this->{"serviceId"} !== null)
            $service = Service::getById($this->{"serviceId"});

        /** @var Service $service */
        return $service;
    }

    /**
     * @param Service $service
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setService(Service $service): self
    {
        $this->{"serviceId"} = $service->getId();

        /** @var self $this */
        return $this;
    }


}