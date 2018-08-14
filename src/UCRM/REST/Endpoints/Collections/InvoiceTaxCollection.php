<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\{Collectible, Collection, Exceptions\CollectionException};
use UCRM\REST\Endpoints\Lookups\InvoiceTax;

final class InvoiceTaxCollection extends Collection
{
    /**
     * InvoiceTaxCollection constructor.
     * @param Collectible[]|null $elements
     * @throws CollectionException
     */
    public function __construct(?array $elements = [])
    {
        parent::__construct(InvoiceTax::class, $elements);
    }
}