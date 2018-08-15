<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

use MVQN\Collections\Exceptions\CollectionException;
use MVQN\Annotations\Exceptions\AnnotationReaderException;
use MVQN\Helpers\Exceptions\ArrayHelperException;
use MVQN\Helpers\Exceptions\PatternMatchException;

use UCRM\REST\Exceptions\RestClientException;
use UCRM\REST\Endpoints\Exceptions\EndpointException;

use UCRM\REST\Endpoints\{Organization, Client};

/**
 * Trait ClientHelper
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
    // HELPER METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Resets all Invoice Options for this Client.
     *
     * @return self
     */
    public function resetAllInvoiceOptions(): self
    {
        $this->sendInvoiceByPost = null;
        $this->invoiceMaturityDays = null;
        $this->stopServiceDue = null;
        $this->stopServiceDueDays = null;
        // TODO: Add 'Late fee delay' to list of resets when made available!

        /** @var self $this */
        return $this;
    }

    /**
     * Resets the 'Invoice by Post' option for this Client.
     *
     * @return self
     */
    public function resetSendInvoiceByPost(): self
    {
        $this->sendInvoiceByPost = null;

        /** @var self $this */
        return $this;
    }

    /**
     * Resets the 'Invoice Maturity Days' option for this Client.
     *
     * @return self
     */
    public function resetInvoiceMaturityDays(): self
    {
        $this->invoiceMaturityDays = null;

        /** @var self $this */
        return $this;
    }

    /**
     * Resets the 'Suspend Service if Payment is Overdue' option for this Client.
     *
     * @return self
     */
    public function resetStopServiceDue(): self
    {
        $this->stopServiceDue = null;

        /** @var self $this */
        return $this;
    }

    /**
     * Resets the 'Suspension Delay' option for this Client.
     *
     * @return self
     */
    public function resetStopServiceDueDays(): self
    {
        $this->stopServiceDueDays = null;

        /** @var self $this */
        return $this;
    }



    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $firstName
     * @param string $lastName
     * @return Client
     * @throws AnnotationReaderException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
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
     * @param string $firstName
     * @param string $lastName
     * @return Client
     * @throws AnnotationReaderException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
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
     * @param string $companyName
     * @return Client
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
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
     * @param string $companyName
     * @return Client
     * @throws EndpointException
     * @throws \MVQN\Annotations\Exceptions\AnnotationReaderException
     * @throws \MVQN\Collections\Exceptions\CollectionException
     * @throws \MVQN\Helpers\Exceptions\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
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

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return Client
     * @throws AnnotationReaderException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws ArrayHelperException
     * @throws \ReflectionException
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
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
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
     * @throws AnnotationReaderException
     * @throws ArrayHelperException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public function sendInvitationEmail(): Client
    {
        /** @var Client $client */
        $client = Client::patch(null, [ "id" => $this->getId() ], "/send-invitation");
        return $client;
    }







}