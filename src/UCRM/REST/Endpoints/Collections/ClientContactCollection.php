<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\{Collectible, Collection, CollectionException};
use UCRM\REST\Endpoints\Lookups\ClientContact;

/**
 * Class ClientContactCollection
 *
 * @package UCRM\REST\Endpoints\Collections
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
final class ClientContactCollection extends Collection
{
    /**
     * ClientContactCollection constructor.
     * @param Collectible[]|null $elements
     * @throws CollectionException
     */
    public function __construct(?array $elements = [])
    {
        parent::__construct(ClientContact::class, $elements);
    }
}