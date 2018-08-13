<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Helpers\ArrayHelperPathException;
use MVQN\Helpers\PatternMatchException;

use UCRM\REST\Endpoints\ClientLog;
use UCRM\REST\Endpoints\{Client,User};

/**
 * Trait ClientLogHelper
 * @package UCRM\REST\Endpoints\Helpers
 */
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
     * @throws \ReflectionException
     */
    public function getClient(): ?Client
    {
        if($this->clientId !== null)
            $client = Client::getById($this->clientId);

        /** @var Client $client */
        return $client;
    }

    /**
     * @param Client $client
     * @return ClientLog
     */
    public function setClient(Client $client): ClientLog
    {
        $this->clientId = $client->getId();
        /** @var ClientLog $this */
        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return User|null
     * @throws AnnotationReaderException
     * @throws ArrayHelperPathException
     * @throws PatternMatchException
     * @throws \ReflectionException
     */
    public function getUser(): ?User
    {
        if($this->userId !== null)
            $user = User::getById($this->userId);

        /** @var User $user */
        return $user;
    }

    /**
     * @param User $user
     * @return ClientLog
     */
    public function setUser(User $user): ClientLog
    {
        $this->userId = $user->getId();
        /** @var ClientLog $this */
        return $this;
    }



}