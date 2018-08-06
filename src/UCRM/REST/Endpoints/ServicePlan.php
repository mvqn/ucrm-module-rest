<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Exceptions\RestClientException;


/**
 * Class ServicePlan
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class ServicePlan extends Endpoint
{
    /** @const string  */
    protected const ENDPOINT = "/service-plans";

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
    /** @var int  */
    protected $organizationId;

    /**
     * @return int
     */
    public function getOrganizationId(): int
    {
        return $this->organizationId;
    }

    /** @var Organization $organization */
    protected $organization = null;

    /**
     * @return Organization
     * @throws RestClientException
     */
    public function getClient(): Organization
    {
        // Cache the value here for future lookups...
        if($this->organization === null)
            $this->organization = Organization::getById($this->organizationId);

        return $this->organization;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $invoiceLabel;

    /**
     * @return string
     */
    public function getInvoiceLabel(): string
    {
        return $this->invoiceLabel;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $downloadBurst;

    /**
     * @return int
     */
    public function getDownloadBurst(): int
    {
        return $this->downloadBurst;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $uploadBurst;

    /**
     * @return int
     */
    public function getUploadBurst(): int
    {
        return $this->uploadBurst;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $downloadSpeed;

    /**
     * @return int
     */
    public function getDownloadSpeed(): int
    {
        return $this->downloadSpeed;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $uploadSpeed;

    /**
     * @return int
     */
    public function getUploadSpeed(): int
    {
        return $this->uploadSpeed;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $dataUsageLimit;

    /**
     * @return int
     */
    public function getDataUsageLimit(): int
    {
        return $this->dataUsageLimit;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    protected $taxable;

    /**
     * @return bool
     */
    public function getTaxable(): bool
    {
        return $this->taxable;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var ServicePlanPeriod[] $periods  */
    protected $periods;

    /**
     * @return ServicePlanPeriod[]
     */
    public function getPeriods(): array
    {
        return $this->periods;
    }

}



