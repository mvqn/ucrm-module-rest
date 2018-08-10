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
 *
 * @endpoints { "get": "/client-logs", "getById": "/client-logs/:id" }
 */
final class ClientLog extends Endpoint
{
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @post
     * @patch
     *
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
     * @param int $value
     * @return ClientLog Returns the ClientLog instance, for method chaining purposes.
     */
    public function setClientId(int $value): ClientLog
    {
        $this->clientId = $value;
        return $this;
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
        if($this->client === null && $this->clientId !== null)
            $this->client = Client::getById($this->clientId);

        return $this->client;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $message;

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $value
     * @return ClientLog Returns the ClientLog instance, for method chaining purposes.
     */
    public function setMessage(string $value): ClientLog
    {
        $this->message = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     * @post
     * @patch
     */
    protected $userId;

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int $value
     * @return ClientLog Returns the ClientLog instance, for method chaining purposes.
     */
    public function setUserId(int $value): ClientLog
    {
        $this->userId = $value;
        return $this;
    }

    /**
     * @var User $user
     */
    protected $user = null;

    /**
     * @return User|null
     * @throws RestClientException
     */
    public function getUser(): ?User
    {
        // Cache the value here for future lookups...
        if($this->user === null && $this->userId !== null)
            $this->user = User::getById($this->userId);

        return $this->user;
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $createdDate;

    /**
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }

    /**
     * @param string $value
     * @return ClientLog Returns the ClientLog instance, for method chaining purposes.
     */
    public function setCreatedDate(string $value): ClientLog
    {
        $this->createdDate = $value;
        return $this;
    }

}



