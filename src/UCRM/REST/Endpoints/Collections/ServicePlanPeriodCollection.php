<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\Lookups\ServicePlanPeriod;

final class ServicePlanPeriodCollection extends Collection
{
    /**
     * ServicePlanCollection constructor.
     *
     * @param ServicePlanPeriod[] $elements
     * @throws \MVQN\Collections\CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(ServicePlanPeriod::class, $elements);
    }
}