<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Helpers\UserHelper;

/**
 * Class User
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @endpoints { "get": "/users/admins", "getById": "/users/admins/:id" }
 */
final class User extends Endpoint
{
    use UserHelper;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     */
    protected $email;

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $username;

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var string
     */
    protected $firstName;

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $lastName;

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $avatarColor;

    /**
     * @return string|null
     */
    public function getAvatarColor(): ?string
    {
        return $this->avatarColor;
    }


}



