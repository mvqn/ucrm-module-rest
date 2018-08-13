<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\User;

final class UserCollection extends Collection
{
    /**
     * ClientTagCollection constructor.
     *
     * @param User[] $elements
     * @throws \MVQN\Collections\CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(User::class, $elements);
    }
}