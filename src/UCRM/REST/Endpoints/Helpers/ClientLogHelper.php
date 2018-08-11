<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Helpers\ArrayHelperPathException;
use MVQN\Helpers\PatternMatchException;
use UCRM\REST\Endpoints\ClientLog;
use UCRM\REST\Endpoints\User;
use UCRM\REST\Exceptions\RestClientException;
use UCRM\REST\Exceptions\RestObjectException;

use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\Organization;
use UCRM\REST\Endpoints\Client;
use UCRM\REST\Endpoints\Country;
use UCRM\REST\Endpoints\State;
use UCRM\REST\Endpoints\ClientContact;


trait ClientLogHelper
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return null|Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function getClient(): ?Client
    {
        if($this->clientId !== null)
            $client = Client::getById($this->clientId);

        /** @var Client $client */
        return $client;
    }

    public function setClientByName(string $first, string $last): ClientLog
    {
        $matches = Client::whereAll([ "firstName" => $first, "lastName" => $last ]);

        if(count($matches) === 0)
            $this->clientId = null;

        if(count($matches) === 1)
            $this->clientId = $matches[0]->getId();

        if(count($matches) > 1)
            echo ""; // TODO: Determine how we should handle the case where multiple matches occur!

        /** @var ClientLog $this */
        return $this;
    }




    /**
     * @return User|null
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function getUser(): ?User
    {
        // Cache the value here for future lookups...
        if($this->userId !== null)
            $user = User::getById($this->userId);

        /** @var User $user */
        return $user;
    }


    /**
     * @param string $email
     * @return ClientLog
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function setUserByEmail(string $email): ClientLog
    {
        $user = User::findFirst("email", $email);
        $this->userId = $user->getId();

        /** @var ClientLog $this */
        return $this;
    }

    public function setUserByName(string $first, string $last): ClientLog
    {
        $matches = User::whereAll([ "firstName" => $first, "lastName" => $last ]);

        if(count($matches) === 0)
            $this->userId = null;

        if(count($matches) === 1)
            $this->userId = $matches[0]->getId();

        if(count($matches) > 1)
            echo ""; // TODO: Determine how we should handle the case where multiple matches occur!

        /** @var ClientLog $this */
        return $this;
    }



}