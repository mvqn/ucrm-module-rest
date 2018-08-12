<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Lookups;



/**
 * Class InvoiceItem
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class InvoiceItem extends Lookup
{
    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $label;

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
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
    /** @var int  */
    protected $quantity;

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $unit;

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $tax1Id;

    /**
     * @return int
     */
    public function getTax1Id(): int
    {
        return $this->tax1Id;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $tax2Id;

    /**
     * @return int
     */
    public function getTax2Id(): int
    {
        return $this->tax2Id;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $tax3Id;

    /**
     * @return int
     */
    public function getTax3Id(): int
    {
        return $this->tax3Id;
    }

}



