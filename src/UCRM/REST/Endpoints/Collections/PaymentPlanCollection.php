<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\PaymentPlan;

final class PaymentPlanCollection extends Collection
{
    /**
     * ClientTagCollection constructor.
     *
     * @param PaymentPlan[] $elements
     * @throws \MVQN\Collections\CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(PaymentPlan::class, $elements);
    }
}