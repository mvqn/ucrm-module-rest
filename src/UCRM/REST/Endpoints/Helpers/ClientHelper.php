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
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param int $clientType
     * @param bool $isLead
     * @param Organization|null $organization
     * @return Client
     * @throws \ReflectionException
     */
    public static function create(int $clientType = Client::CLIENT_TYPE_RESIDENTIAL, bool $isLead = true,
        Organization $organization = null): Client
    {
        if($organization === null)
            $organization = Organization::getByDefault();

        $client = new Client([
            "clientType" => $clientType,
            "isLead" => $isLead,
            // DEFAULTS...
            "invoiceAddressSameAsContact" => true,
            "organizationId" => $organization->getId(),
            "registrationDate" => (new \DateTime())->format("c")
        ]);

        return $client;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $firstName
     * @param string $lastName
     * @param bool $isLead
     * @param Organization|null $organization
     * @return Client
     * @throws \ReflectionException
     */
    public static function createResidential(string $firstName, string $lastName, bool $isLead = false,
        Organization $organization = null): Client
    {
        $client =
            Client::create(Client::CLIENT_TYPE_RESIDENTIAL, $isLead, $organization)
                ->setFirstName($firstName)
                ->setLastName($lastName);

        return $client;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $companyName
     * @param string $firstName
     * @param string $lastName
     * @param bool $isLead
     * @param Organization|null $organization
     * @return Client
     * @throws \ReflectionException
     */
    public static function createCommercial(string $companyName, string $firstName, string $lastName,
        bool $isLead = false, Organization $organization = null): Client
    {
        $client =
            Client::create(Client::CLIENT_TYPE_COMMERCIAL, $isLead, $organization)
                ->setFirstName($firstName)
                ->setLastName($lastName)
                ->setCompanyName($companyName);

        return $client;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Client
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function insert(): Client
    {
        /** @var Client $data */
        $data = $this;

        /** @var Client $result */
        $result = Client::post($data);
        return $result;
    }

    // =================================================================================================================
    // READ METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // BASE GET METHODS USED!



    // =================================================================================================================
    // UPDATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

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
    // DELETE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // NO DELETE ENDPOINTS



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