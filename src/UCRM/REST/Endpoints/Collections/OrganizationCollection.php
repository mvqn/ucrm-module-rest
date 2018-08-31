<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\{Collectible, Collection, CollectionException};
use UCRM\REST\Endpoints\Organization;

/**
 * Class OrganizationCollection
 *
 * @package UCRM\REST\Endpoints\Collections
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
final class OrganizationCollection extends Collection
{
    /**
     * OrganizationCollection constructor.
     * @param Collectible[]|null $elements
     * @throws CollectionException
     */
    public function __construct(?array $elements = [])
    {
        parent::__construct(Organization::class, $elements);
    }
}