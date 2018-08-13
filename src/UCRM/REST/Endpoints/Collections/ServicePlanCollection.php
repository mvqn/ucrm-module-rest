<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\ServicePlan;

final class ServicePlanCollection extends Collection
{
    /**
     * ServicePlanCollection constructor.
     *
     * @param Service[] $elements
     * @throws \MVQN\Collections\CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(ServicePlan::class, $elements);
    }
}