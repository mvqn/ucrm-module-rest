<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use MVQN\Annotations\Exceptions\AnnotationReaderException;
//use MVQN\Collections\Exceptions\CollectionException;
use MVQN\Helpers\Exceptions\ArrayHelperException;
use MVQN\Helpers\Exceptions\PatternMatchException;

use UCRM\REST\Endpoints\Exceptions\EndpointException;
use UCRM\REST\Exceptions\RestClientException;

use UCRM\REST\Endpoints\Client;

/**
 * Trait ClientHelpers
 *
 * @package UCRM\REST\Endpoints\Helpers\Common
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait ClientHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Client
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function getClient(): Client
    {
        if(property_exists($this, "clientId") && $this->{"clientId"} !== null)
            $client = Client::getById($this->{"clientId"});

        /** @var Client $client */
        return $client;
    }

    /**
     * @param Client $client
     * @return self
     */
    public function setClient(Client $client): self
    {
        $this->{"clientId"} = $client->getId();

        /** @var self $this */
        return $this;
    }

}