<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\{Collection,Exceptions\CollectionException};
use UCRM\REST\Endpoints\ServiceSurcharge;

final class ServiceSurchargeCollection extends Collection
{
    /**
     * ServiceSurchargeCollection constructor.
     * @param array $elements
     * @throws CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(ServiceSurcharge::class, $elements);
    }
}