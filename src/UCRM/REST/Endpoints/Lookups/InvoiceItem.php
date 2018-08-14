<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Lookups;

use UCRM\REST\Endpoints\Helpers\InvoiceItemHelper;

/**
 * Class InvoiceItem
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 *
 */
final class InvoiceItem extends Lookup
{
    use InvoiceItemHelper;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $value
     * @return InvoiceItem
     */
    public function setId(int $value): InvoiceItem
    {
        $this->id = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @patch
     */
    protected $label;

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string $value
     * @return InvoiceItem
     */
    public function setLabel(string $value): InvoiceItem
    {
        $this->label = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     * @patch
     */
    protected $price;

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float $value
     * @return InvoiceItem
     */
    public function setPrice(float $value): InvoiceItem
    {
        $this->price = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     * @patch
     */
    protected $quantity;

    /**
     * @return float|null
     */
    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    /**
     * @param float $value
     * @return InvoiceItem
     */
    public function setQuantity(float $value): InvoiceItem
    {
        $this->quantity = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @patch
     */
    protected $unit;

    /**
     * @return string|null
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }

    /**
     * @param string $value
     * @return InvoiceItem
     */
    public function setUnit(string $value): InvoiceItem
    {
        $this->unit = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @patch
     */
    protected $tax1Id;

    /**
     * @return int|null
     */
    public function getTax1Id(): ?int
    {
        return $this->tax1Id;
    }

    /**
     * @param int $value
     * @return InvoiceItem
     */
    public function setTax1Id(int $value): InvoiceItem
    {
        $this->tax1Id = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @patch
     */
    protected $tax2Id;

    /**
     * @return int|null
     */
    public function getTax2Id(): ?int
    {
        return $this->tax2Id;
    }

    /**
     * @param int $value
     * @return InvoiceItem
     */
    public function setTax2Id(int $value): InvoiceItem
    {
        $this->tax2Id = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @patch
     */
    protected $tax3Id;

    /**
     * @return int|null
     */
    public function getTax3Id(): ?int
    {
        return $this->tax3Id;
    }

    /**
     * @param int $value
     * @return InvoiceItem
     */
    public function setTax3Id(int $value): InvoiceItem
    {
        $this->tax3Id = $value;
        return $this;
    }

}
