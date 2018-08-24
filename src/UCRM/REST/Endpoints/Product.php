<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Helpers\ProductHelper;

/**
 * Class Product
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/products", "getById": "/products/:id" }
 * @endpoints { "post": "/products" }
 * @endpoints { "patch": "/products/:id" }
 */
final class Product extends Endpoint
{
    use ProductHelper;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post-required
     * @patch-required
     */
    protected $name;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $value
     * @return Product
     */
    public function setName(string $value): Product
    {
        $this->name = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     * @patch
     */
    protected $invoiceLabel;

    /**
     * @return string|null
     */
    public function getInvoiceLabel(): ?string
    {
        return $this->invoiceLabel;
    }

    /**
     * @param string $value
     * @return Product
     */
    public function setInvoiceLabel(string $value): Product
    {
        $this->invoiceLabel = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     * @post-required
     * @patch-required
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
     * @return Product
     */
    public function setPrice(float $value): Product
    {
        $this->price = $value;
        return $this;
    }

// -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
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
     * @return Product
     */
    public function setUnit(string $value): Product
    {
        $this->unit = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     * @post
     * @patch
     */
    protected $taxable;

    /**
     * @return bool|null
     */
    public function getTaxable(): ?bool
    {
        return $this->taxable;
    }

    /**
     * @param bool $value
     * @return Product
     */
    public function setTaxable(bool $value): Product
    {
        $this->taxable = $value;
        return $this;
    }

}
