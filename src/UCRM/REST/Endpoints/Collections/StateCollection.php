<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\State;

final class StateCollection extends Collection
{
    /**
     * ClientTagCollection constructor.
     *
     * @param State[] $elements
     * @throws \MVQN\Collections\CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(State::class, $elements);
    }
}