<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Collections\UserCollection;
use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\Service;
use UCRM\REST\Endpoints\ServicePlan;

trait ServicePlanHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    public function getServicePlan(): ?ServicePlan
    {
        if($this->servicePlanId !== null)
            $servicePlan = ServicePlan::getById($this->servicePlanId);

        /** @var ServicePlan $servicePlan */
        return $servicePlan;
    }

    /**
     * @param ServicePlan $value
     * @return Service Returns the Service instance, for method chaining purposes.
     */
    public function setServicePlan(ServicePlan $value): Service
    {
        $this->servicePlanId = $value->getId();

        /** @var Service $this */
        return $this;
    }

    /**
     * @param string $name
     * @return Service
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \MVQN\Collections\CollectionException
     * @throws \ReflectionException
     */
    public function setServicePlanByName(string $name): Service
    {
        /** @var ServicePlan $servicePlan */
        $servicePlan = ServicePlan::getByName($name);
        $this->servicePlanId = $servicePlan->getId();

        /** @var Service $this */
        return $this;
    }


}