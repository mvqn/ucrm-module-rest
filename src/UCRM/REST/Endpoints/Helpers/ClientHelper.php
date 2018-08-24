<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\CollectionException;
use MVQN\Common\ArraysException;
use MVQN\Common\PatternsException;

use UCRM\REST\Endpoints\EndpointException;
use UCRM\REST\{RestClientException, RestObjectException};

use UCRM\REST\Endpoints\{Collections\ClientCollection, Organization, Client};

/**
 * Trait ClientHelper
 *
 * @package UCRM\REST\Endpoints\Helpers
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait ClientHelper
{
    use Common\OrganizationHelpers;
    use Common\CountryHelpers;
    use Common\StateHelpers;
    use Common\InvoiceCountryHelpers;
    use Common\InvoiceStateHelpers;
    use Common\ContactHelpers;
    use Common\AddressHelpers;
    use Common\InvoiceAddressHelpers;

    // =================================================================================================================
    // OBJECT METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Resets all Invoice Options for this Client.
     *
     * @return Client Returns the current Client, for method chaining purposes.
     */
    public function resetAllInvoiceOptions(): Client
    {
        $this->sendInvoiceByPost = null;
        $this->invoiceMaturityDays = null;
        $this->stopServiceDue = null;
        $this->stopServiceDueDays = null;
        // TODO: Add 'Late fee delay' to list of resets when made available!

        /** @var Client $this */
        return $this;
    }

    /**
     * Resets the 'Invoice by Post' option for this Client.
     *
     * @return Client Returns the current Client, for method chaining purposes.
     */
    public function resetSendInvoiceByPost(): Client
    {
        $this->sendInvoiceByPost = null;

        /** @var Client $this */
        return $this;
    }

    /**
     * Resets the 'Invoice Maturity Days' option for this Client.
     *
     * @return Client Returns the current Client, for method chaining purposes.
     */
    public function resetInvoiceMaturityDays(): Client
    {
        $this->invoiceMaturityDays = null;

        /** @var Client $this */
        return $this;
    }

    /**
     * Resets the 'Suspend Service if Payment is Overdue' option for this Client.
     *
     * @return Client Returns the current Client, for method chaining purposes.
     */
    public function resetStopServiceDue(): Client
    {
        $this->stopServiceDue = null;

        /** @var Client $this */
        return $this;
    }

    /**
     * Resets the 'Suspension Delay' option for this Client.
     *
     * @return Client Returns the current Client, for method chaining purposes.
     */
    public function resetStopServiceDueDays(): Client
    {
        $this->stopServiceDueDays = null;

        /** @var Client $this */
        return $this;
    }

    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Creates the minimal Residential Client to be used as a starting point for a new Client.
     *
     * @param string $firstName The Client's first name.
     * @param string $lastName The Client's last name.
     * @return Client Returns a partially generated Client for further use before insertion.
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function createResidential(string $firstName, string $lastName): Client
    {
        $organization = Organization::getByDefault();

        $client = new Client([
            "clientType" => Client::CLIENT_TYPE_RESIDENTIAL,
            "isLead" => false,
            "invoiceAddressSameAsContact" => true,
            "organizationId" => $organization->getId(),
            "registrationDate" => (new \DateTime())->format("c"),
            "firstName" => $firstName,
            "lastName" => $lastName
        ]);

        return $client;
    }

    /**
     * Creates the minimal Residential Client (Lead) to be used as a starting point for a new Client.
     *
     * @param string $firstName The Client's first name.
     * @param string $lastName The Client's last name.
     * @return Client Returns a partially generated Client for further use before insertion.
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function createResidentialLead(string $firstName, string $lastName): Client
    {
        $organization = Organization::getByDefault();

        $client = new Client([
            "clientType" => Client::CLIENT_TYPE_RESIDENTIAL,
            "isLead" => true,
            "invoiceAddressSameAsContact" => true,
            "organizationId" => $organization->getId(),
            "registrationDate" => (new \DateTime())->format("c"),
            "firstName" => $firstName,
            "lastName" => $lastName
        ]);

        return $client;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Creates the minimal Commericial Client to be used as a starting point for a new Client.
     *
     * @param string $companyName The company name of this Commercial Client.
     * @return Client Returns a partially generated Client for further use before insertion.
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function createCommercial(string $companyName): Client
    {
        $organization = Organization::getByDefault();

        $client = new Client([
            "clientType" => Client::CLIENT_TYPE_COMMERCIAL,
            "isLead" => false,
            "invoiceAddressSameAsContact" => true,
            "organizationId" => $organization->getId(),
            "registrationDate" => (new \DateTime())->format("c"),
            "companyName" => $companyName
        ]);

        return $client;
    }

    /**
     * Creates the minimal Commericial Client (Lead) to be used as a starting point for a new Client.
     *
     * @param string $companyName The company name of this Commercial Client.
     * @return Client Returns a partially generated Client for further use before insertion.
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function createCommercialLead(string $companyName): Client
    {
        $organization = Organization::getByDefault();

        $client = new Client([
            "clientType" => Client::CLIENT_TYPE_COMMERCIAL,
            "isLead" => true,
            "invoiceAddressSameAsContact" => true,
            "organizationId" => $organization->getId(),
            "registrationDate" => (new \DateTime())->format("c"),
            "companyName" => $companyName
        ]);

        return $client;
    }

    // =================================================================================================================
    // READ METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Sends an HTTP GET Request using the calling class's annotated information, for an object, given the Custom ID.
     *
     * @param string $userIdent The Custom ID of the Client for which to retrieve.
     * @return Client|null Returns the matching Client or NULL, if none was found.
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function getByUserIdent(string $userIdent): ?Client
    {
        /** @var Client $client */
        $client = Client::get("", [], [ "userIdent" => $userIdent ])->first();

        // Custom ID is Unique, so return the only result or null!
        return $client;
    }

    /**
     * Sends an HTTP GET Request using the calling class's annotated information, for objects, given an Attribute pair.
     *
     * @param string $key The Custom Attribute Key for which to search, will be converted to camel case as needed.
     * @param string $value The Custom Attribute Value for which to search.
     * @return ClientCollection Returns a collection of Clients matching the given criteria.
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function getByCustomAttribute(string $key, string $value): ClientCollection
    {
        // TODO: Determine if this is ALWAYS the case!
        $key = lcfirst($key);

        /** @var ClientCollection $clients */
        $clients = Client::get("", [], [ "customAttributeKey" => $key, "customAttributeValue" => $value ]);
        return new ClientCollection($clients->elements());
    }

    // =================================================================================================================
    // UPDATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // DELETE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // EXTRA FUNCTIONS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Sends an invitation email to this Client.
     *
     * @return Client Returns the Client for which the invitation email was just sent.
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws RestObjectException
     * @throws \ReflectionException
     */
    public function sendInvitationEmail(): Client
    {
        /** @var Client $client */
        $client = Client::patch(null, [ "id" => $this->getId() ], "/send-invitation");
        return $client;
    }

}