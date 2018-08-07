<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;
use UCRM\REST\Exceptions\RestClientException;



/**
 * Class Tax
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
final class Tax extends RestObject
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