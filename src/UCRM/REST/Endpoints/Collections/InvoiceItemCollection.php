<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\Lookups\InvoiceItem;

final class InvoiceItemCollection extends Collection
{
    /**
     * ClientTagCollection constructor.
     *
     * @param InvoiceItem[] $elements
     * @throws \MVQN\Collections\CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(InvoiceItem::class, $elements);
    }
}