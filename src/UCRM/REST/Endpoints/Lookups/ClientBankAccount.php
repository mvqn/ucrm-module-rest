<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Lookups;

/**
 * Class ClientBankAccount
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class ClientBankAccount extends Lookup
{

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @param string $value
     * @return ClientBankAccount Returns the ClientBankAccount instance, for method chaining purposes.
     */
    public function setAccountNumber(string $value): ClientBankAccount
    {
        $this->accountNumber = $value;
        return $this;
    }

}
