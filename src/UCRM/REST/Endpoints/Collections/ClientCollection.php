<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\Client;

final class ClientCollection extends Collection
{
    /**
     * ClientTagCollection constructor.
     *
     * @param Client[] $elements
     * @throws \MVQN\Collections\CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(Client::class, $elements);
    }
}