<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;



use MVQN\Annotations\AnnotationReader;
use MVQN\Helpers\ArrayHelpers;
use MVQN\Helpers\PatternMatcher;
use UCRM\REST\{RestClient, Scraper};
use UCRM\REST\Exceptions\RestClientException;




/**
 * Class Country
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
abstract class Endpoint extends RestObject
{
    /** @const string  */
    protected const ENDPOINT = "";
    /** @const string  */
    protected const ENDPOINT_PARENT = "";




















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
        $data = ($data !== null) ? $data->toFields("patch") : "{}";

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