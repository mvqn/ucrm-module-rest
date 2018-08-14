<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Collections\ServicePlanPeriodCollection;
use UCRM\REST\Endpoints\Helpers\ServicePlanHelper;
use UCRM\REST\Endpoints\Lookups\ServicePlanPeriod;

/**
 * Class ServicePlan
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/service-plans", "getById": "/service-plans/:id" }
 * @endpoints { "post": "/service-plans" }
 * @endpoints { "patch": "/service-plans" }
 */
final class ServicePlan extends Endpoint
{
    use ServicePlanHelper;

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
     * @return ServicePlan
     */
    public function setName(string $value): ServicePlan
    {
        $this->name = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $organizationId;

    /**
     * @return int|null
     */
    public function getOrganizationId(): ?int
    {
        return $this->organizationId;
    }

    /**
     * @param int $value
     * @return ServicePlan
     */
    public function setOrganizationId(int $value): ServicePlan
    {
        $this->organizationId = $value;
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
     * @return ServicePlan
     */
    public function setInvoiceLabel(string $value): ServicePlan
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
    protected $downloadBurst;

    /**
     * @return float|null
     */
    public function getDownloadBurst(): ?float
    {
        return $this->downloadBurst;
    }

    /**
     * @param float $value
     * @return ServicePlan
     */
    public function setDownloadBurst(float $value): ServicePlan
    {
        $this->downloadBurst = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     * @post
     * @patch
     */
    protected $uploadBurst;

    /**
     * @return float|null
     */
    public function getUploadBurst(): ?float
    {
        return $this->uploadBurst;
    }

    /**
     * @param float $value
     * @return ServicePlan
     */
    public function setUploadBurst(float $value): ServicePlan
    {
        $this->uploadBurst = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     * @post
     * @patch
     */
    protected $downloadSpeed;

    /**
     * @return float|null
     */
    public function getDownloadSpeed(): ?float
    {
        return $this->downloadSpeed;
    }

    /**
     * @param float $value
     * @return ServicePlan
     */
    public function setDownloadSpeed(float $value): ServicePlan
    {
        $this->downloadSpeed = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var float
     * @post
     * @patch
     */
    protected $uploadSpeed;

    /**
     * @return float|null
     */
    public function getUploadSpeed(): ?float
    {
        return $this->uploadSpeed;
    }

    /**
     * @param float $value
     * @return ServicePlan
     */
    public function setUploadSpeed(float $value): ServicePlan
    {
        $this->uploadSpeed = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var int
     * @post
     * @patch
     */
    protected $dataUsageLimit;

    /**
     * @return int|null
     */
    public function getDataUsageLimit(): ?int
    {
        return $this->dataUsageLimit;
    }

    /**
     * @param int $value
     * @return ServicePlan
     */
    public function setDataUsageLimit(int $value): ServicePlan
    {
        $this->dataUsageLimit = $value;
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
     * @return ServicePlan
     */
    public function setTaxable(bool $value): ServicePlan
    {
        $this->taxable = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var ServicePlanPeriod[] $periods
     * @post
     * @patch
     */
    protected $periods;

    /**
     * @return ServicePlanPeriod[]
     */
    public function getPeriods(): array
    {
        return $this->periods;
    }

    /**
     * @param ServicePlanPeriodCollection $value
     * @return ServicePlan
     */
    public function setPeriods(ServicePlanPeriodCollection $value): ServicePlan
    {
        $this->periods = $value->elements();
        return $this;
    }

}
