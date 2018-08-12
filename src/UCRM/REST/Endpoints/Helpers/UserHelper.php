<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\Collection;
use MVQN\Helpers\ArrayHelperPathException;
use MVQN\Helpers\PatternMatchException;
use UCRM\REST\Endpoints\User;
use UCRM\REST\Exceptions\RestObjectException;

use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\Organization;
use UCRM\REST\Endpoints\Client;
use UCRM\REST\Endpoints\Country;
use UCRM\REST\Endpoints\State;
use UCRM\REST\Endpoints\ClientContact;


trait UserHelper
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------



    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $email
     * @return User|null
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public static function getByEmail(string $email): ?User
    {
        $users = new Collection(User::class, User::get());

        /** @var User $user */
        $user = $users->where("email", $email)->first();
        return $user;
    }

    /**
     * @param string $first
     * @param string $last
     * @return User|null
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public static function getByName(string $first, string $last): ?User
    {
        $users = new Collection(User::class, User::get());

        /** @var User $user */
        $user = $users->whereAll([ "firstName" => $first, "lastName" => $last ])->first();
        return $user;
    }

    /**
     * @param string $first
     * @param string $last
     * @return User|null
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Collections\CollectionException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public static function getByUsername(string $username): ?User
    {
        $users = new Collection(User::class, User::get());

        /** @var User $user */
        $user = $users->where("username", $username)->first();
        return $user;
    }

}