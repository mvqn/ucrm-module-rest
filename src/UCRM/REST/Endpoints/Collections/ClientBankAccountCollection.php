<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Collections;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\Lookups\ClientBankAccount;

final class ClientBankAccountCollection extends Collection
{
    /**
     * ClientTagCollection constructor.
     *
     * @param ClientBankAccount[] $elements
     * @throws \MVQN\Collections\CollectionException
     */
    public function __construct(array $elements = [])
    {
        parent::__construct(ClientBankAccount::class, $elements);
    }
}