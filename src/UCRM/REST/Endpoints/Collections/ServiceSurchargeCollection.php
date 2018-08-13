<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\ServiceSurcharge;

final class ServiceSurchargeCollection extends Collection
{
    /**
     * ServiceSurchargeCollection constructor.
     *
     * @param ServiceSurcharge[] $elements
     * @throws \MVQN\Collections\Exceptions\CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(ServiceSurcharge::class, $elements);
    }
}