<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Collections\UserCollection;
use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\Service;

trait ServiceHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Service
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Endpoints\Exceptions\EndpointException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getService(): Service
    {
        if(property_exists($this, "serviceId") && $this->{"serviceId"} !== null)
            $service = Service::getById($this->{"serviceId"});

        /** @var Service $service */
        return $service;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param Service $service
     * @return self
     */
    public function setService(Service $service): self
    {
        $this->{"serviceId"} = $service->getId();

        /** @var self $this */
        return $this;
    }


}