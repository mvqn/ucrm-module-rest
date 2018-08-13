<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\Lookups\ClientContactType;

final class ClientContactTypeCollection extends Collection
{
    /**
     * ClientTagCollection constructor.
     * 
     * @param ClientContactType[] $elements
     * @throws \MVQN\Collections\CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(ClientContactType::class, $elements);
    }
}