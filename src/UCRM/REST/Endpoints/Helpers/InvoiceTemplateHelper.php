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
use UCRM\REST\Endpoints\Collections\InvoiceTemplateCollection;

// Endpoints
use UCRM\REST\Endpoints\InvoiceTemplate;

/**
 * Trait InvoiceTemplateHelper
 *
 * @package UCRM\REST\Endpoints\Helpers
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
trait InvoiceTemplateHelper
{

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
     * @param string $name
     * @return InvoiceTemplateCollection
     *
     * @throws AnnotationReaderException
     * @throws ArraysException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternsException
     * @throws RestClientException
     * @throws \ReflectionException
     */
    public static function getByName(string $name): InvoiceTemplateCollection
    {
        $invoiceTemplates = InvoiceTemplate::get()->where("name", $name);

        return new InvoiceTemplateCollection($invoiceTemplates->elements());
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