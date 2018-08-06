<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;


/**
 * Class ServicePlanPeriod
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class ServicePlanPeriod extends Lookup
{
    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $period;

    /**
     * @return int
     */
    public function getPeriod(): int
    {
        return $this->period;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var float  */
    protected $price;

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    protected $enabled;

    /**
     * @return bool
     */
    public function getEnabled(): bool
    {
        return $this->enabled;
    }

}



