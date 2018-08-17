<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use MVQN\Annotations\Exceptions\AnnotationReaderException;
//use MVQN\Collections\Exceptions\CollectionException;
use MVQN\Helpers\Exceptions\ArrayHelperException;
use MVQN\Helpers\Exceptions\PatternMatchException;

use UCRM\REST\Exceptions\RestClientException;
use UCRM\REST\Endpoints\Exceptions\EndpointException;

use UCRM\REST\Endpoints\ServicePlan;

/**
 * Trait ServicePlanHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait ServicePlanHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return ServicePlan|null
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function getServicePlan(): ?ServicePlan
    {
        if($this->{"servicePlanId"} !== null)
            $servicePlan = ServicePlan::getById($this->{"servicePlanId"});

        /** @var ServicePlan $servicePlan */
        return $servicePlan;
    }

    /**
     * @param ServicePlan $value
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setServicePlan(ServicePlan $value): self
    {
        $this->{"servicePlanId"} = $value->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $name
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws \ReflectionException
     */
    public function setServicePlanByName(string $name): self
    {
        /** @var ServicePlan $servicePlan */
        $servicePlan = ServicePlan::getByName($name);
        $this->{"servicePlanId"} = $servicePlan->getId();

        /** @var self $this */
        return $this;
    }


}