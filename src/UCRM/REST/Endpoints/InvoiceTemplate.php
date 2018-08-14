<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Helpers\InvoiceTemplateHelper;

/**
 * Class InvoiceTemplate
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/invoice-templates", "getById": "/invoice-templates/:id" }
 */
final class InvoiceTemplate extends Endpoint
{
    use InvoiceTemplateHelper;

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
