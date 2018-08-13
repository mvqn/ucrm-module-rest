<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\{Collection,Exceptions\CollectionException};
use UCRM\REST\Endpoints\Lookups\PaymentCover;

final class PaymentCoverCollection extends Collection
{
    /**
     * PaymentPlanCollection constructor.
     * @param array $elements
     * @throws CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(PaymentCover::class, $elements);
    }
}