<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;
use UCRM\REST\Exceptions\RestClientException;


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
     * @return int
     */
    public function getId(): int
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}



