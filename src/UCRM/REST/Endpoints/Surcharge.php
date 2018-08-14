<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Helpers\SurchargeHelper;

/**
 * Class Surcharge
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/surcharges" }
 * @endpoints { "getById": "/surcharges/:id" }
 * @endpoints { "post": "/surcharges" }
 * @endpoints { "patch": "/surcharges/:id" }
 */
final class Surcharge extends Endpoint
{
    use SurchargeHelper;

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
     * @return Surcharge
     */
    public function setName(string $value): Surcharge
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
     * @return Surcharge
     */
    public function setInvoiceLabel(string $value): Surcharge
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
     * @return Surcharge
     */
    public function setPrice(float $value): Surcharge
    {
        $this->price = $value;
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
     * @return Surcharge
     */
    public function setTaxable(bool $value): Surcharge
    {
        $this->taxable = $value;
        return $this;
    }

}
