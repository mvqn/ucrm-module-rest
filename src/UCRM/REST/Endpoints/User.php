<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;


use UCRM\REST\Endpoints\Helpers\UserHelper;

/**
 * Class User
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Endpoint { "get": "/users/admins", "getById": "/users/admins/:id" }
 *
 * @method string|null getEmail()
 * @method string|null getUsername()
 * @method string|null getFirstName()
 * @method string|null getLastName()
 * @method string|null getAvatarColor()
 *
 */
final class User extends EndpointObject
{
    use UserHelper;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $avatarColor;

}
