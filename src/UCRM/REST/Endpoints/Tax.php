<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;



/**
 * Class Tax
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/taxes", "getById": "/taxes/:id" }
 */
final class Tax extends Endpoint
{
    /**
     * @var int
     * @key
     *
     */
    protected $id;

    /**
     * @var string
     * @required
     */
    protected $name;

    /**
     * @var string
     */
    protected $agencyName;

    /**
     * Tax rate in percentage
     *
     * @var float
     * @required
     */
    protected $rate;

    /**
     * @var bool
     *
     */
    protected $selected;





}