<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;
use UCRM\REST\Exceptions\RestClientException;


/**
 * Class Contact
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class Contact extends Lookup
{
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
    protected $clientId;

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /** @var Client $client */
    protected $client = null;

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        // Cache the value here for future lookups...
        if($this->client === null)
            $this->client = Client::getById($this->clientId);

        return $this->client;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $email;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $phone;

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

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
    /** @var bool  */
    protected $isBilling;

    /**
     * @return bool
     */
    public function getIsBilling(): bool
    {
        return $this->isBilling;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var bool  */
    protected $isContact;

    /**
     * @return bool
     */
    public function getIsContact(): bool
    {
        return $this->isContact;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var ContactType[]  */
    protected $types;

    /**
     * @return ContactType[]
     */
    public function getContactTypes(): array
    {
        return $this->types;
    }

}



