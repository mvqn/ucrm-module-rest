<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;
use UCRM\REST\Exceptions\RestClientException;


/**
 * Class ContactBankAccount
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class ContactBankAccount extends Lookup
{
    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $accountNumber;

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

}



