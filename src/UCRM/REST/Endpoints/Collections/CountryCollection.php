<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\Country;

final class CountryCollection extends Collection
{
    /**
     * ClientTagCollection constructor.
     *
     * @param Country[] $elements
     * @throws \MVQN\Collections\CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(Country::class, $elements);
    }
}