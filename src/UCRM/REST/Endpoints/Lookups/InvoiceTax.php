<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Lookups;

/**
 * Class InvoiceTax
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class InvoiceTax extends Lookup
{

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $name;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     */
    protected $totalValue;

    /**
     * @return float|null
     */
    public function getTotalValue(): ?float
    {
        return $this->totalValue;
    }

}
