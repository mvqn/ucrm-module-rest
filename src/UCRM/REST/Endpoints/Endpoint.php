<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\Annotations\AnnotationReader;
use MVQN\Helpers\ArrayHelpers;
use MVQN\Helpers\PatternMatcher;
use MVQN\Annotations\AnnotationReaderException;
use MVQN\Helpers\PatternMatchException;
use MVQN\Helpers\ArrayHelperPathException;


use UCRM\REST\RestClient;
use UCRM\REST\Exceptions\RestClientException;



/**
 * Class Endpoint
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
abstract class Endpoint extends RestObject
{
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Inserts (via POST) an Endpoint Object to the REST server.
     *
     * @return Endpoint Returns an Endpoint object representing the newly created object on the REST server.
     * @throws RestClientException Throws an exception if there were any issues during communication to the server.
     */
    public function insert(): Endpoint
    {
        /** @var Endpoint $class */
        $class = get_called_class();

        /** @var Endpoint $client */
        $client = $class::post($this);
        return $client;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Updates (via PATCH) an Endpoint Object to the REST server.
     *
     * @return Endpoint Returns an Endpoint object representing the newly created object on the REST server.
     * @throws RestClientException Throws an exception if there were any issues during communication to the server.
     * @throws AnnotationReaderException Throws an exception if there were any issues with the AnnotationReader.
     * @throws ArrayHelperPathException Throws an exception if there were any issues with the Array Helpers.
     * @throws PatternMatchException Throws an exception if there were any issues with the Pattern Matching system.
     * @throws \ReflectionException Throws an exception if there were any issues with the Reflection engine.
     */
    public function update(): Endpoint
    {
        /** @var Endpoint $class */
        $class = get_called_class();

        /** @var Endpoint $client */
        $client = $class::patch($this->id, $this);
        return $client;
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Deletes (via DELETE) an Endpoint Object to the REST API.
     *
     * @return Endpoint
     */
    public function delete(): Endpoint
    {
        /** @var static $class */
        $class = get_called_class();

        // TODO: Implement DELETE functionality.

        /** @var Endpoint $client */
        //$client = $class::delete($this->id, $this);
        return $client;
    }











    /**
     * @return static[]
     * @throws RestClientException
     */
    public static function get(): array
    {
        /** @var static $class */
        $class = get_called_class();

        $annotations = new AnnotationReader($class);
        $endpoints = $annotations->getParameter("endpoints");

        if(!array_key_exists("get", $endpoints) || $endpoints["get"] === "")
            throw new RestClientException("An '@endpoint { \"get\": \"/example/:id\" }' annotation on the class must ".
                "be declared in order to resolve this endpoint'");

        $endpoint = PatternMatcher::interpolateUrl($endpoints["get"], []);

        $response = RestClient::get($endpoint);

        //echo "*** ".json_encode($response, JSON_UNESCAPED_SLASHES);

        if(array_key_exists("code", $response) && $response["code"] === 404)
            throw new RestClientException("Endpoint '$endpoint' was not found for class '$class'!");

        if($response === [])
            return []; // Really empty?

        //$objects = json_decode($response, true);

        if(ArrayHelpers::is_assoc($response))
            //return new $class($response);
            return [new $class($response)];

        $endpoints = [];
        foreach($response as $object)
            $endpoints[] = new $class($object);

        return $endpoints;
    }


    public static function post(Endpoint $fields): array
    {
        /** @var static $class */
        $class = get_called_class();

        $annotations = new AnnotationReader($class);
        $endpoints = $annotations->getParameter("endpoints");

        if(!array_key_exists("getById", $endpoints))
            throw new RestClientException("An '@endpoint { \"getById\": \"/example/:id/other\" }' annotation on the ".
                "'$class' class must be declared in order to resolve this endpoint'");

        $endpoint = PatternMatcher::interpolateUrl($endpoints["getById"], [ "id" => $id ]);

        $response = RestClient::post($endpoint, $fields);

        //echo "*** ".json_encode($response, JSON_UNESCAPED_SLASHES);

        if(array_key_exists("code", $response) && $response["code"] === 404)
            throw new RestClientException("Endpoint '$endpoint' was not found for class '$class'!");

        if($response === [])
            return []; // Really empty?

        //$objects = json_decode($response, true);



        return new $class($response);
    }




    /**
     * @param int $id
     * @return static|null
     * @throws RestClientException
     */
    public static function getById(int $id): ?Endpoint
    {
        /** @var static */
        $class = get_called_class();

        $annotations = new AnnotationReader($class);
        $endpoints = $annotations->getParameter("endpoints");

        if(!array_key_exists("getById", $endpoints))
            throw new RestClientException("An '@endpoint { \"getById\": \"/example/:id/other\" }' annotation on the ".
                "'$class' class must be declared in order to resolve this endpoint'");

        $endpoint = PatternMatcher::interpolateUrl($endpoints["getById"], [ "id" => $id ]);

        $response = RestClient::get($endpoint);

        //echo "*** ".json_encode($response, JSON_UNESCAPED_SLASHES);

        if(array_key_exists("code", $response) && $response["code"] === 404)
            throw new RestClientException("Endpoint '$endpoint' was not found for class '$class'!");

        $endpoint = new $class($response);

        return $endpoint;
    }


    /**
     * @param int $id
     * @param null|Endpoint $data
     * @param string $suffix
     * @return null|Endpoint
     * @throws RestClientException
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     */
    public static function patch(int $id, ?Endpoint $data, string $suffix = ""): ?Endpoint
    {
        /** @var static */
        $class = get_called_class();

        $annotations = new AnnotationReader($class);
        $endpoints = $annotations->getParameter("endpoints");

        if(!array_key_exists("getById", $endpoints))
            throw new RestClientException("An '@endpoint { \"getById\": \"/example/:id/other\" }' annotation on the ".
                "'$class' class must be declared in order to resolve this endpoint'");

        $endpoint = PatternMatcher::interpolateUrl($endpoints["getById"], [ "id" => $id ]);

        if($suffix !== "")
            $endpoint = $endpoint.$suffix;

        echo "PATCH $endpoint\n";

        // Get an array of all Model properties.
        $data = ($data !== null) ? $data->toJSON("patch") : "{}";

        // TODO: Remove all uneccessary fields!

        //print_r($data);

        //die();

        $response = RestClient::patch($endpoint, $data);

        // Endpoint Not Found!
        if(array_key_exists("code", $response) && $response["code"] === 404)
            throw new RestClientException("Endpoint '$endpoint' was not found for class '$class'!");

        // Validation Failed!
        if(array_key_exists("code", $response) && $response["code"] === 422)
            throw new RestClientException(
                "Data for endpoint '$endpoint' was improperly formatted!\n".
                $response["message"]."\n".
                json_encode($response["errors"], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
            );

        return new $class($response);
    }









    public static function scrape(string $url, EndpointOptions $options): ?Endpoint
    {
        /*
        Scraper::download(
            "https://ucrmbeta.docs.apiary.io/#reference/clients/clientsuseridentcustomattributekeycustomattributevalueorderdirection/get",
            __DIR__."/.cache/test.html");
        */

        // TODO: Determine best approach to complete Scraper or APIB.

        return null;
    }





}