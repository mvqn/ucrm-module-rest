<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Helpers\ClientLogHelper;


/**
 * Class ClientLog
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/client-logs", "getById": "/client-logs/:id" }
 * @endpoints { "post": "/client-logs" }
 */
final class ClientLog extends Endpoint
{
    use ClientLogHelper;

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
     * @param \DateTime $value
     * @return ClientLog Returns the ClientLog instance, for method chaining purposes.
     */
    public function setCreatedDate(\DateTime $value): ClientLog
    {
        $this->createdDate = $value->format("c");
        return $this;
    }



}



