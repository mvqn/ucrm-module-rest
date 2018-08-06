<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Exceptions\RestClientException;


/**
 * Class ClientLog
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class ClientLog extends Endpoint
{
    /** @const string  */
    protected const ENDPOINT = "/client-logs";

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
    /** @var string  */
    protected $message;

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $userId;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /** @var User $user */
    protected $user = null;

    /**
     * @return User
     * @throws RestClientException
     */
    public function getUser(): User
    {
        // Cache the value here for future lookups...
        if($this->user === null)
            $this->user = User::getById($this->userId);

        return $this->user;
    }
    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $createdDate;

    /**
     * @return string
     */
    public function getCreatedDate(): string
    {
        return $this->createdDate;
    }

}



