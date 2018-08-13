<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Helpers\ServiceSurchargeHelper;

/**
 * Class ServiceSurcharge
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/clients/services/:serviceId/service-surcharges" }
 * @endpoints { "getById": "/clients/services/service-surcharges/:id" }
 * @endpoints { "post": "/clients/services/:serviceId/service-surcharges" }
 * @endpoints { "patch": "/clients/services/service-surcharges/:id" }
 */
final class ServiceSurcharge extends Endpoint
{
    use ServiceSurchargeHelper;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     */
    protected $serviceId;

    /**
     * @return int|null
     */
    public function getServiceId(): ?int
    {
        return $this->serviceId;
    }

    /**
     * @param int $value
     * @return ServiceSurcharge
     */
    public function setServiceId(int $value): ServiceSurcharge
    {
        $this->serviceId = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post-required
     * @patch
     */
    protected $surchargeId;

    /**
     * @return int|null
     */
    public function getSurchargeId(): ?int
    {
        return $this->surchargeId;
    }

    /**
     * @param int $value
     * @return ServiceSurcharge
     */
    public function setSurchargeId(int $value): ServiceSurcharge
    {
        $this->surchargeId = $value;
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
     * @return ServiceSurcharge
     */
    public function setInvoiceLabel(string $value): ServiceSurcharge
    {
        $this->invoiceLabel = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     * @post
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
     * @return ServiceSurcharge
     */
    public function setPrice(float $value): ServiceSurcharge
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
     * @return ServiceSurcharge
     */
    public function setTaxable(bool $value): ServiceSurcharge
    {
        $this->taxable = $value;
        return $this;
    }


}



