<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;
use UCRM\REST\Exceptions\RestClientException;


/**
 * Class ClientContactAttribute
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class ClientContactAttribute extends Lookup
{
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     */
    protected $clientId;

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @var Client $client
     */
    protected $client = null;

    /**
     * @return Client
     * @throws RestClientException
     */
    public function getClient(): Client
    {
        // Cache the value here for future lookups...
        if($this->client === null)
            $this->client = Client::getById($this->clientId);

        return $this->client;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $key;

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $value;

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @post
     * @patch
     */
    protected $customAttributeId;

    /**
     * @return int
     */
    public function getCustomAttributeId(): int
    {
        return $this->customAttributeId;
    }


}



