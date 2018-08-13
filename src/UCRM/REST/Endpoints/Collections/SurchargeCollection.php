<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\Surcharge;

final class SurchargeCollection extends Collection
{
    /**
     * SurchargeCollection constructor.
     *
     * @param Surcharge[] $elements
     * @throws \MVQN\Collections\Exceptions\CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(Surcharge::class, $elements);
    }
}