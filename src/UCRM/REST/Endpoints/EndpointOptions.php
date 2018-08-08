<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;
use UCRM\REST\Exceptions\RestClientException;



/**
 * Class EndpointOptions
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class EndpointOptions
{



    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    private $_useBeta = false;

    /**
     * @return bool
     */
    public function getUseBeta(): bool
    {
        return $this->_useBeta;
    }

    /**
     * @param bool $useBeta
     * @return EndpointOptions
     */
    public function setUseBeta(bool $useBeta): EndpointOptions
    {
        $this->_useBeta = $useBeta;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $_baseUrl = "https://ucrm.docs.apiary.io/#reference";

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->_baseUrl;
    }

    /**
     * @param string $baseUrl
     * @return EndpointOptions
     */
    public function setBaseUrl(string $baseUrl): EndpointOptions
    {
        $this->_baseUrl = $baseUrl;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var array  */
    private $_endpoints = null;

    /**
     * @return array|null
     */
    public function getEndpoints(): ?array
    {
        return $this->_endpoints;
    }

    /**
     * @param string $class
     * @return array|null
     */
    public function getEndpoint(string $class): ?array
    {
        return array_key_exists($class, $this->_endpoints) ? $this->_endpoints : null;
    }

    /**
     * @param string $class
     * @param string $path
     * @return EndpointOptions
     */
    public function addEndpoint(string $class, string $path): EndpointOptions
    {
        $this->_endpoints[$class]["path"] = $path;
        return $this;
    }

    /**
     * @param string $class
     * @param string $name
     * @param string $path
     * @return EndpointOptions
     */
    public function addEndpointNode(string $class, string $name, string $path): EndpointOptions
    {
        $this->_endpoints[$class]["nodes"][$name] = $path;
        return $this;
    }








}



