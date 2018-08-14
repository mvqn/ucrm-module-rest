<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\{Collectible, Collection, Exceptions\CollectionException};
use UCRM\REST\Endpoints\Lookups\ServicePlanPeriod;

final class ServicePlanPeriodCollection extends Collection
{
    /**
     * ServicePlanPeriodCollection constructor.
     * @param Collectible[]|null $elements
     * @throws CollectionException
     */
    public function __construct(?array $elements = [])
    {
        parent::__construct(ServicePlanPeriod::class, $elements);
    }
}