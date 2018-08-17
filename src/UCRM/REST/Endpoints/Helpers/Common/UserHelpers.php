<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use MVQN\Annotations\Exceptions\AnnotationReaderException;
use MVQN\Collections\Exceptions\CollectionException;
use MVQN\Helpers\Exceptions\ArrayHelperException;
use MVQN\Helpers\Exceptions\PatternMatchException;

use UCRM\REST\Exceptions\RestClientException;
use UCRM\REST\Endpoints\Exceptions\EndpointException;

use UCRM\REST\Endpoints\User;

/**
 * Trait UserHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait UserHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return User|null
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function getUser(): ?User
    {
        if(property_exists($this, "userId") && $this->{"userId"} !== null)
            $user = User::getById($this->{"userId"});

        /** @var User $user */
        return $user;
    }

    /**
     * @param string $email
     * @return User|null
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function getByEmail(string $email): ?User
    {
        $users = User::get();

        /** @var User $user */
        $user = $users->where("email", $email)->first();
        return $user;
    }

    /**
     * @param string $first
     * @param string $last
     * @return User|null
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function getByName(string $first, string $last): ?User
    {
        $users = User::get();

        /** @var User $user */
        $user = $users->whereAll([ "firstName" => $first, "lastName" => $last ])->first();
        return $user;
    }

    /**
     * @param string $username
     * @return User|null
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function getByUsername(string $username): ?User
    {
        $users = User::get();

        /** @var User $user */
        $user = $users->where("username", $username)->first();
        return $user;
    }


    /**
     * @param User $user
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     */
    public function setUser(User $user): self
    {
        $this->{"userId"} = $user->getId();

        /** @var self $this */
        return $this;
    }

    /**
     * @param string $email
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function setUserByEmail(string $email): self
    {
        /** @var User $user */
        $users = User::get();
        $user = $users->where("email", $email)->first();

        $this->{"userId"} = $user->getId();
        /** @var self $this */
        return $this;
    }

    /**
     * @param string $username
     * @return self Returns the appropriate Endpoint instance, for method chaining purposes.
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function setUserByUsername(string $username): self
    {
        /** @var User $user */
        $users = User::get();
        $user = $users->where("username", $username)->first();

        $this->{"userId"} = $user->getId();
        /** @var self $this */
        return $this;
    }


}