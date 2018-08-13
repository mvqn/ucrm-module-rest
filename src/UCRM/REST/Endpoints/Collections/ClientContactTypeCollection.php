<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\{Collection,Exceptions\CollectionException};
use UCRM\REST\Endpoints\Lookups\ClientContactType;

final class ClientContactTypeCollection extends Collection
{
    /**
     * ClientContactTypeCollection constructor.
     * @param array $elements
     * @throws CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(ClientContactType::class, $elements);
    }
}