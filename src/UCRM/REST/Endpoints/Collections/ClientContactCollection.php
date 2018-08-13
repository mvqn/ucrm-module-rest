<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\Lookups\ClientContact;

final class ClientContactCollection extends Collection
{
    /**
     * ClientTagCollection constructor.
     *
     * @param ClientContact[] $elements
     * @throws \MVQN\Collections\CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(ClientContact::class, $elements);
    }
}