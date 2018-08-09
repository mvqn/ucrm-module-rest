<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;



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
    /** @const string  */
    protected const ENDPOINT = "/users/admins";

    // -----------------------------------------------------------------------------------------------------------------
    /** @var int  */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $email;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $username;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $firstName;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $lastName;

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /** @var string  */
    protected $avatarColor;

    /**
     * @return string
     */
    public function getAvatarColor(): string
    {
        return $this->avatarColor;
    }

}



