<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use Nette\NotImplementedException;
use UCRM\REST\Endpoints\Helpers\TaxHelper;
use UCRM\REST\RestClient;

/**
 * Class Tax
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/taxes" }
 * @endpoints { "getById": "/taxes/:id" }
 * @endpoints { "post": "/taxes" }
 */
final class Tax extends Endpoint
{
    use TaxHelper;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post-required
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
     * @return Tax
     */
    public function setName(string $value): Tax
    {
        $this->name = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @post
     */
    protected $agencyName;

    /**
     * @return string|null
     */
    public function getAgencyName(): ?string
    {
        return $this->agencyName;
    }

    /**
     * @param string $value
     * @return Tax
     */
    public function setAgencyName(string $value): Tax
    {
        $this->agencyName = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Tax rate in percentage.
     *
     * @var float|null
     * @post-required
     */
    protected $rate;

    /**
     * @return float|null
     */
    public function getRate(): ?float
    {
        return $this->rate;
    }

    /**
     * @param float $value
     * @return Tax
     */
    public function setRate(float $value): Tax
    {
        $this->rate = $value;
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Is selected to be assigned to every new client as default.
     *
     * @var bool|null
     *
     */
    protected $selected;

    /**
     * @return bool|null
     */
    public function getSelected(): ?bool
    {
        return $this->selected;
    }

    /**
     * @param bool $value
     * @return Tax
     *
     * @deprecated Not currently supported!
     */
    public function setSelected(bool $value): Tax
    {
        //$this->selected = $value;
        return $this;
    }



}