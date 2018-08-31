<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints\Helpers;

// Core
use MVQN\Annotations\AnnotationReaderException;
use MVQN\Collections\CollectionException;
use MVQN\Common\ArraysException;
use MVQN\Common\PatternsException;

// Exceptions
use UCRM\REST\Endpoints\EndpointException;
use UCRM\REST\RestClientException;

// Collections
use UCRM\REST\Endpoints\Collections\ClientLogCollection;

// Endpoints
use UCRM\REST\Endpoints\ClientLog;

/**
 * Trait ClientLogHelper
 *
 * @package UCRM\REST\Endpoints\Helpers
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait ClientLogHelper
{
    use Common\ClientHelpers;
    use Common\UserHelpers;

    // =================================================================================================================
    // OBJECT METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // CREATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // =================================================================================================================
    // READ METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Sends an HTTP GET Request using the calling class's annotated information, for objects, given the Client ID.
     *
     * @param int $clientId The Client ID for which to filter the Client Logs.
     * @return ClientLogCollection Returns a collection of Client Logs, belonging to the specified Client ID.
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function getByClientId(int $clientId): ClientLogCollection
    {
        /** @var ClientLogCollection $clientLogs */
        $clientLogs = ClientLog::get("", [], [ "clientId" => $clientId ]);
        return $clientLogs;
    }

    /**
     * Sends an HTTP GET Request using the calling class's annotated information, for objects, given the Creation Date.
     *
     * @param \DateTime $date The date for which to retrieve all Client Logs.
     * @return ClientLogCollection Returns a collection of Client Logs, created on the specified date.
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function getByCreatedDate(\DateTime $date): ClientLogCollection
    {
        /** @var ClientLogCollection $clientLogs */
        $clientLogs = ClientLog::get("", [], [ "createdDateFrom" => $date->format("Y-m-d"),
            "createdDateTo" => $date->format("Y-m-d") ]);

        return new ClientLogCollection($clientLogs->elements());
    }

    /**
     * Sends an HTTP GET Request using the calling class's annotated information, for objects, given the Creation Date.
     *
     * @param \DateTime $from The starting date for which to retrieve all Client Logs.
     * @param \DateTime $to The ending date for which to retrieve all Client Logs.
     * @return ClientLogCollection Returns a collection of Client Logs, created between the specified dates.
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function getByCreatedDateBetween(\DateTime $from, \DateTime $to): ClientLogCollection
    {
        /** @var ClientLogCollection $clientLogs */
        $clientLogs = ClientLog::get("", [], [ "createdDateFrom" => $from->format("Y-m-d"),
            "createdDateTo" => $to->format("Y-m-d") ]);

        return new ClientLogCollection($clientLogs->elements());
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

}