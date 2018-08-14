<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Helpers\QuoteTemplateHelper;

/**
 * Class QuoteTemplate
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/quote-templates", "getById": "/quote-templates/:id" }
 */
final class QuoteTemplate extends Endpoint
{
    use QuoteTemplateHelper;

    // =================================================================================================================
    // PROPERTIES
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
    protected $createdDate;

    /**
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     */
    protected $isOfficial;

    /**
     * @return bool|null
     */
    public function getIsOfficial(): ?bool
    {
        return $this->isOfficial;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var bool
     */
    protected $isValid;

    /**
     * @return bool|null
     */
    public function getIsValid(): ?bool
    {
        return $this->isValid;
    }

}
