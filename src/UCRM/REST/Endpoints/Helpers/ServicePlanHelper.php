<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;


use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\CollectionException;
use MVQN\Common\ArraysException;
use MVQN\Common\PatternsException;
use UCRM\REST\Endpoints\{EndpointException, Helpers\Common\OrganizationHelpers, ServicePlan};
use UCRM\REST\Endpoints\Collections\ServicePlanCollection;
use UCRM\REST\RestClientException;

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
     * @return ServicePlanCollection
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
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