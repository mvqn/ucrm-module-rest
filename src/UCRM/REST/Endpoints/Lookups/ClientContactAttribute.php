<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Lookups;

use UCRM\REST\Endpoints\Helpers\Common\ClientHelpers;

/**
 * Class ClientContactAttribute
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class ClientContactAttribute extends Lookup
{
    use ClientHelpers;

    // =================================================================================================================
    // PROPERTIES
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
