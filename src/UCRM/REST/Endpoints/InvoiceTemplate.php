<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\Collections\Exceptions\CollectionException;
use UCRM\REST\Endpoints\Collections\InvoiceItemCollection;
use UCRM\REST\Endpoints\Collections\InvoiceTaxCollection;
use UCRM\REST\Endpoints\Collections\PaymentCoverCollection;
use UCRM\REST\Endpoints\Helpers\InvoiceHelper;
use UCRM\REST\Endpoints\Helpers\InvoiceTemplateHelper;
use UCRM\REST\Endpoints\Lookups\InvoiceItem;
use UCRM\REST\Endpoints\Lookups\InvoiceTax;
use UCRM\REST\Endpoints\Lookups\PaymentCover;

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
     * @return InvoiceTemplate
     */
    public function setName(string $value): InvoiceTemplate
    {
        $this->name = $value;
        return $this;
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

    /**
     * @param \DateTime $value
     * @return InvoiceTemplate
     */
    public function setCreatedDate(\DateTime $value): InvoiceTemplate
    {
        $this->createdDate = $value->format("c");
        return $this;
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

    /**
     * @param bool $value
     * @return InvoiceTemplate
     */
    public function setIsOfficial(bool $value): InvoiceTemplate
    {
        $this->isOfficial = $value;
        return $this;
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

    /**
     * @param bool $value
     * @return InvoiceTemplate
     */
    public function setIsValid(bool $value): InvoiceTemplate
    {
        $this->isValid = $value;
        return $this;
    }

}



