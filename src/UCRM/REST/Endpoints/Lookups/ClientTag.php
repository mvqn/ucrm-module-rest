<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Lookups;

use UCRM\REST\RestClient;

use UCRM\REST\Endpoints\Lookup;

/**
 * Class ClientTag
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class ClientTag extends Lookup
{
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int|null
     */
    public function getId(): int
    {
        return $this->id;
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

    /**
     * @param string $value
     * @return ClientTag Returns the ClientTag instance, for method chaining purposes.
     */
    public function setName(string $value): ClientTag
    {
        $this->name = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $colorBackground;

    /**
     * @return string
     */
    public function getColorBackground(): string
    {
        return $this->colorBackground;
    }

    /**
     * @param string $value
     * @return ClientTag Returns the ClientTag instance, for method chaining purposes.
     */
    public function setColorBackground(string $value): ClientTag
    {
        $this->colorBackground = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $colorText;

    /**
     * @return string
     */
    public function getColorText(): string
    {
        return $this->colorText;
    }

    /**
     * @param string $value
     * @return ClientTag Returns the ClientTag instance, for method chaining purposes.
     */
    public function setColorText(string $value): ClientTag
    {
        $this->colorText = $value;
        return $this;
    }

}



