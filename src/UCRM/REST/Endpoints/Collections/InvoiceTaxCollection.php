<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\Lookups\InvoiceTax;

final class InvoiceTaxCollection extends Collection
{
    /**
     * ClientTagCollection constructor.
     *
     * @param InvoiceTax[] $elements
     * @throws \MVQN\Collections\CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(InvoiceTax::class, $elements);
    }
}