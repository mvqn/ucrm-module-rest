<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Collections\UserCollection;
use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\User;

trait UserHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return User
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function getUser(): User
    {
        if(property_exists($this, "userId") && $this->{"userId"} !== null)
            $user = User::getById($this->{"userId"});

        /** @var User $user */
        return $user;
    }

    public static function getByEmail(string $email): ?User
    {
        $users = User::get();

        /** @var User $user */
        $user = $users->where("email", $email)->first();
        return $user;
    }

    public static function getByName(string $first, string $last): ?User
    {
        $users = User::get();

        /** @var User $user */
        $user = $users->whereAll([ "firstName" => $first, "lastName" => $last ])->first();
        return $user;
    }

    public static function getByUsername(string $username): ?User
    {
        $users = User::get();

        /** @var User $user */
        $user = $users->where("username", $username)->first();
        return $user;
    }


    /**
     * @param User $user
     * @return self
     */
    public function setUser(User $user): self
    {
        $this->{"userId"} = $user->getId();
        /** @var self $this */
        return $this;
    }

    /**
     * @param string $email
     * @return UserHelpers
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
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
     * @return UserHelpers
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
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