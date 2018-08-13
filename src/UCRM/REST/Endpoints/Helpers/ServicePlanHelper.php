<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;


use UCRM\REST\Endpoints\{Helpers\Common\OrganizationHelpers, ServicePlan};
use UCRM\REST\Endpoints\Collections\{CountryCollection, ServicePlanCollection, StateCollection};

/**
 * Trait ServicePlanHelper
 *
 * @package UCRM\REST\Endpoints\Helpers
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait ServicePlanHelper
{
    use OrganizationHelpers;

    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $name
     * @return ServicePlanCollection|null
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public static function getByName(string $name): ServicePlanCollection
    {
        $servicePlans = ServicePlan::get();
        $servicePlans = new ServicePlanCollection($servicePlans);

        /** @var ServicePlanCollection $servicePlanList */
        $servicePlanList = $servicePlans->where("name", $name);
        return new ServicePlanCollection($servicePlanList->elements());
    }






}