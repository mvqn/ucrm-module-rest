<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;



/**
 * Class InvoiceTax
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class InvoiceTax extends Lookup
{
    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var float  */
    protected $totalValue;

    /**
     * @return float
     */
    public function getTotalValue(): float
    {
        return $this->totalValue;
    }


}



