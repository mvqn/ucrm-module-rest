<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;

use UCRM\REST\Endpoints\Helpers\OrganizationHelper;

/**
 * Class Organization
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/organizations", "getById": "/organizations/:id" }
 *
 * @method string|null getName()
 *
 * @method string|null getRegistrationNumber()
 *
 * @method string|null getTaxId()
 *
 * @method string|null getPhone()
 *
 * @method string|null getEmail()
 *
 * @method string|null getWebsite()
 *
 * @method string|null getStreet1()
 *
 * @method string|null getStreet2()
 *
 * @method string|null getCity()
 *
 * @method int|null getCountryId()
 *
 * @method int|null getStateId()
 *
 * @method string|null getZipCode()
 *
 * @method bool|null getSelected()
 *
 */
final class Organization extends EndpointObject
{
    use OrganizationHelper;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $registrationNumber;

    /**
     * @var string
     */
    protected $taxId;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $website;

    /**
     * @var string
     */
    protected $street1;

    /**
     * @var string
     */
    protected $street2;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var int
     */
    protected $countryId;

    /**
     * @var int
     */
    protected $stateId;

    /**
     * @var string
     */
    protected $zipCode;

    /**
     * @var bool
     */
    protected $selected;

}
