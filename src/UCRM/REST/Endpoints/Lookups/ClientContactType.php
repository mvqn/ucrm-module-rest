<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Lookups;

use UCRM\REST\RestClient;

use UCRM\REST\Endpoints\Lookup;


/**
 * Class ClientContactType
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class ClientContactType extends Lookup
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
     * @return ClientContactType Returns the ClientContactType instance, for method chaining purposes.
     */
    public function setName(string $value): ClientContactType
    {
        $this->name = $value;
        return $this;
    }

}



