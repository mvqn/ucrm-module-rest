<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers\Common;

use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\{Collections\ClientContactCollection, Country, Lookups\ClientContact, State, Client};

trait ClientHelpers
{
    // =================================================================================================================
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Client
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
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