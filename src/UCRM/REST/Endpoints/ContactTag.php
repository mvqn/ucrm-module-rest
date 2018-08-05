<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;
use UCRM\REST\Exceptions\RestClientException;


/**
 * Class ContactTag
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class ContactTag extends Lookup
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
    /** @var string  */
    protected $colorBackground;

    /**
     * @return string
     */
    public function getColorBackground(): string
    {
        return $this->colorBackground;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $colorText;

    /**
     * @return string
     */
    public function getColorText(): string
    {
        return $this->colorText;
    }

}



