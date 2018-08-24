<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\{Collectible, Collection, CollectionException};
use UCRM\REST\Endpoints\Tax;

/**
 * Class TaxCollection
 *
 * @package UCRM\REST\Endpoints\Collections
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
final class TaxCollection extends Collection
{
    /**
     * TaxCollection constructor.
     * @param Collectible[]|null $elements
     * @throws CollectionException
     */
    public function __construct(?array $elements = [])
    {
        parent::__construct(Tax::class, $elements);
    }
}