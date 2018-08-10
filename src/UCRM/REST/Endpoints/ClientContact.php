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
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
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
    protected $email;

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $value
     * @return ClientContact Returns the ClientContact instance, for method chaining purposes.
     */
    public function setEmail(string $value): ClientContact
    {
        $this->email = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $phone;

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $value
     * @return ClientContact Returns the ClientContact instance, for method chaining purposes.
     */
    public function setPhone(string $value): ClientContact
    {
        $this->phone = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     * @post
     * @patch
     */
    protected $name;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $value
     * @return ClientContact Returns the ClientContact instance, for method chaining purposes.
     */
    public function setName(string $value): ClientContact
    {
        $this->name = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var bool
     * @post
     * @patch
     */
    protected $isBilling;

    /**
     * @return bool|null
     */
    public function getIsBilling(): ?bool
    {
        return $this->isBilling;
    }

    /**
     * @return ClientContact Returns the ClientContact instance, for method chaining purposes.
     */
    public function setAsBilling(): ClientContact
    {
        $this->isBilling = true;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var bool
     * @post
     * @patch
     */
    protected $isContact;

    /**
     * @return bool|null
     */
    public function getIsContact(): ?bool
    {
        return $this->isContact;
    }

    /**
     * @return ClientContact Returns the ClientContact instance, for method chaining purposes.
     */
    public function setAsGeneral(): ClientContact
    {
        $this->isContact = true;
        return $this;
    }



    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var ClientContactType[]
     * @post
     * @patch
     */
    protected $types;

    /**
     * @return ClientContactType[]|null
     */
    public function getTypes(): ?array
    {
        if($this->types === null)
            return null;

        /** @var ClientContactType[] $types */
        $types = $this->getCollection(ClientContactType::class, $this->types);
        return $types;
    }



}



