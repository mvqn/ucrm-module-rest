<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;
use UCRM\REST\Exceptions\RestClientException;


/**
 * Class ClientContact
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class ClientContact extends Lookup
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
     * @post
     * @patch
     */
    protected $email;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $phone;

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
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
     * @var bool
     * @post
     * @patch
     */
    protected $isBilling;

    /**
     * @return bool
     */
    public function getIsBilling(): bool
    {
        return $this->isBilling;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var bool
     * @post
     * @patch
     */
    protected $isContact;

    /**
     * @return bool
     */
    public function getIsContact(): bool
    {
        return $this->isContact;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var ClientContactType[]
     * @post
     * @patch
     */
    protected $types;

    /**
     * @return ClientContactType[]
     */
    public function getTypes(): array
    {
        $types = [];

        foreach($this->types as $type)
            $types[] = new ClientContactType($type);

        return $types;
    }

    /**
     * @param ClientContactType[] $values
     */
    public function setTypes(array $values)
    {

    }

}



