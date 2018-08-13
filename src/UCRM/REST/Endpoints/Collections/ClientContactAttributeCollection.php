<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\Lookups\ClientContactAttribute;

final class ClientContactAttributeCollection extends Collection
{
    /**
     * ClientTagCollection constructor.
     *
     * @param ClientContactAttribute[] $elements
     * @throws \MVQN\Collections\CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(ClientContactAttribute::class, $elements);
    }
}