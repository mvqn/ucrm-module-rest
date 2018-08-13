<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Lookups;

use UCRM\REST\RestClient;


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
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     */
    protected $clientId;

    /**
     * @return int|null
     */
    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    /**
     * @var Client $client
     */
    protected $client = null;

    /**
     * @return Client|null
     * @throws RestClientException
     */
    public function getClient(): ?Client
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
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $key;

    /**
     * @return string|null
     */
    public function getKey(): ?string
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
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return ClientContactAttribute Returns the ClientContactAttribute instance, for method chaining purposes.
     */
    public function setValue(string $value): ClientContactAttribute
    {
        $this->value = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @post
     * @patch
     */
    protected $customAttributeId;

    /**
     * @return int|null
     */
    public function getCustomAttributeId(): ?int
    {
        return $this->customAttributeId;
    }

    /**
     * @param string $value
     * @return ClientContactAttribute Returns the ClientContactAttribute instance, for method chaining purposes.
     */
    public function setCustomAttributeId(string $value): ClientContactAttribute
    {
        $this->customAttributeId = $value;
        return $this;
    }

}



