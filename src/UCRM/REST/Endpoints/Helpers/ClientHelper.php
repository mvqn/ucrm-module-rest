<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\Collection;
use MVQN\Helpers\ArrayHelperPathException;
use MVQN\Helpers\PatternMatchException;

//use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\{Collections\ClientContactCollection,
    Exceptions\EndpointException,
    Organization,
    Client,
    Country,
    State};
use UCRM\REST\Endpoints\Lookups\{ClientBankAccount,ClientContact,ClientContactAttribute,ClientContactType,ClientTag};


trait ClientHelper
{
    use Common\OrganizationHelpers;
    use Common\CountryHelpers;
    use Common\StateHelpers;
    use Common\InvoiceCountryHelpers;
    use Common\InvoiceStateHelpers;
    use Common\ContactHelpers;

    // =================================================================================================================
    // CRUD FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Client
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function create(): Client
    {
        /** @var Client $data */
        $data = $this;

        /** @var Client $client */
        $client = Client::post($data, []);

        return $client;
    }

    /**
     * @return Client
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function update(): Client
    {
        /** @var Client $data */
        $data = $this;

        /** @var Client $client */
        $client = Client::patch($data, [ "id" => $this->getId() ]);

        return $client;
    }

    // =================================================================================================================
    // EXTRA FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Client
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function sendInvitationEmail(): Client
    {
        /** @var Client $client */
        $client = Client::patch(null, [ "id" => $this->getId() ], "/send-invitation");
        return $client;
    }

}