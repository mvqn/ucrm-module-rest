<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Exceptions\RestClientException;


/**
 * Class ServiceSurcharge
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "", "getById": "/clients/services/service-surcharges/:id" }
 */
final class ServiceSurcharge extends Endpoint
{
    /** @const string  */
    //protected const ENDPOINT = "/service-surcharges";

    /** @const string  */
    //protected const ENDPOINT_PARENT = "/clients/services";

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
    /** @var int  */
    protected $serviceId;

    /**
     * @return int
     */
    public function getServiceId(): int
    {
        return $this->serviceId;
    }

    /** @var Service $service */
    protected $service = null;

    /**
     * @return Service
     * @throws RestClientException
     */
    public function getClient(): Service
    {
        // Cache the value here for future lookups...
        if($this->service === null)
            $this->service = Service::getById($this->serviceId);

        return $this->service;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $surchargeId;

    /**
     * @return int
     */
    public function getSurchargeId(): int
    {
        return $this->surchargeId;
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
    protected $taxable;

    /**
     * @return bool
     */
    public function getTaxable(): bool
    {
        return $this->taxable;
    }

}



