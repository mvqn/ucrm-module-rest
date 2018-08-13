<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Lookups;


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
    /**
     * @var int
     */
    protected $period;

    /**
     * @return int|null
     */
    public function getPeriod(): ?int
    {
        return $this->period;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var float
     */
    protected $price;

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var bool
     */
    protected $enabled;

    /**
     * @return bool|null
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

}



