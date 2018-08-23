<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\Annotations\{AnnotationReader,Exceptions\AnnotationReaderException};
use MVQN\Collections\{Collection,Exceptions\CollectionException};
use MVQN\Helpers\ArrayHelper;
use MVQN\Helpers\{PatternMatcher,Exceptions\PatternMatchException};

use UCRM\REST\Endpoints\Exceptions\EndpointException;
use UCRM\REST\{RestObject,RestClient,Exceptions\RestClientException};

/**
 * Class Endpoint
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
abstract class Endpoint extends RestObject
{
    // =================================================================================================================
    // PROPERTIES
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

    // =================================================================================================================
    // GET METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $override
     * @param array $params
     * @param array $query
     * @return Collection
     * @throws AnnotationReaderException
     * @throws CollectionException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \MVQN\Helpers\Exceptions\ArrayHelperException
     * @throws \ReflectionException
     */
    public static function get(string $override = "", array $params = [], array $query = []): Collection
    {
        // Get a reference to the type of Endpoint calling this function.
        $class = get_called_class();

        // Set any flags here for special cases!
        $excludeId = false;

        // IF no override path has been provided...
        if($override === "")
        {
            // THEN instantiate an AnnotationReader for this class AND check for the important parameters.
            $annotations = new AnnotationReader($class);
            $endpoints = $annotations->getParameter("endpoints");
            $excludeId = $annotations->hasParameter("excludeId");
            //$singular = $annotations->hasParameter("singular");

            // Make certain we have found a valid set of GET annotations, or throw an error!
            if (!array_key_exists("get", $endpoints) || $endpoints["get"] === "")
                throw new EndpointException("An '@endpoint { \"get\": \"/examples\" }' annotation on the class must " .
                    "be declared in order to resolve this endpoint'");

            // Interpolate the URL patterns against any provided parameters.
            $endpoint = PatternMatcher::interpolateUrl($endpoints["get"], $params);
        }
        else
        {
            // Interpolate the overridden URL pattern against any provided parameters.
            $endpoint = PatternMatcher::interpolateUrl($override, $params);
            //$endpoint = $override;
        }

        // Appen any provided suffixes to the URL (i.e. query string).
        if($query !== [])
        {
            $pairs = [];

            foreach($query as $key => $value)
                $pairs[] = "$key=$value";

            $endpoint .= "?".implode("&", $pairs);
        }

        // Attempt to GET the specified Endpoint.
        $response = RestClient::get($endpoint);

        // IF the response is empty...
        if($response === [])
        {
            // THEN return null, as we got nothing back!
            return new Collection($class, []);
        }

        // HANDLE ANY ERROR CODES HERE...
        if(array_key_exists("code", $response))
        {
            switch($response["code"])
            {
                case 401: throw new EndpointException("The REST Client was not authorized to make this request!");
                case 403: throw new EndpointException("The provided App Key does not have sufficient privileges!");
                case 404: throw new EndpointException("Endpoint '$endpoint' was not found for class '$class'!");

                // TODO: Add other response codes, as they are encountered!

                default:  break; // Likely the key "code" from an actual Endpoint!
            }
        }

        // Handle shifting any single object responses into a single indexed array for further processing.
        $response = ArrayHelper::is_assoc($response) ? [ $response ] : $response;

        // Create a collection to store the object versions of the response.
        $endpoints = new Collection($class);

        // Loop through each resulting object...
        foreach($response as $object)
        {
            $classObject = new $class($object);

            // Remove the ID property, if the '@excludeId' annotation was set on this class.
            if($excludeId)
                unset($classObject->id);

            // Add the newly instantiated Endpoint to the collection.
            $endpoints->push($classObject);
        }

        // Finally, return the collection of Endpoints!
        return $endpoints;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param int $id
     * @return null|Endpoint
     * @throws AnnotationReaderException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \MVQN\Helpers\Exceptions\ArrayHelperException
     * @throws \ReflectionException
     */
    public static function getById(int $id): ?Endpoint
    {
        // Get a reference to the type of Endpoint calling this function.
        $class = get_called_class();

        // Instantiate an AnnotationReader for this class AND check for the important parameters.
        $annotations = new AnnotationReader($class);
        $endpoints = $annotations->getParameter("endpoints");

        // Make certain we have found a valid set of GET annotations, or throw an error!
        if(!array_key_exists("getById", $endpoints))
            throw new EndpointException("An '@endpoint { \"getById\": \"/examples/:id\" }' annotation on the ".
                "'$class' class must be declared in order to resolve this endpoint'");

        // Interpolate the URL patterns against any provided parameters.
        $endpoint = PatternMatcher::interpolateUrl($endpoints["getById"], [ "id" => $id ]);

        // Attempt to GET the specified Endpoint.
        $response = RestClient::get($endpoint);

        // IF the response is empty, somthing went VERY wrong!
        if($response === [])
        {
            throw new EndpointException("WTF???");
            //return [];
        }

        // HANDLE ANY ERROR CODES HERE...
        if(array_key_exists("code", $response))
        {
            switch($response["code"])
            {
                case 401: throw new EndpointException("The REST Client was not authorized to make this request!");
                case 403: throw new EndpointException("The provided App Key does not have sufficient privileges!");
                case 404: throw new EndpointException("Endpoint '$endpoint' was not found for class '$class'!");

                // TODO: Add other response codes, as they are encountered!

                default:  break; // Likely the key "code" from an actual Endpoint!
            }
        }

        // Finally, return the instantiated Endpoint!
        return new $class($response);
    }

    // =================================================================================================================
    // POST METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param Endpoint $data
     * @param array $params
     * @return Endpoint
     * @throws AnnotationReaderException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \MVQN\Helpers\Exceptions\ArrayHelperException
     * @throws \ReflectionException
     */
    public static function post(Endpoint $data, array $params = []): Endpoint
    {
        // Get a reference to the type of Endpoint calling this function.
        $class = get_called_class();

        // Instantiate an AnnotationReader for this class AND check for the important parameters.
        $annotations = new AnnotationReader($class);
        $endpoints = $annotations->getParameter("endpoints");

        if(!array_key_exists("post", $endpoints))
            throw new EndpointException("An '@endpoint { \"post\": \"/examples\" }' annotation on the ".
                "'$class' class must be declared in order to resolve this endpoint'");

        // Interpolate the URL patterns against any provided parameters.
        $endpoint = PatternMatcher::interpolateUrl($endpoints["post"], $params);

        // Get an array of all Model properties, with any that do not belong in the POST method removed!
        $data = ($data !== null) ? $data->toArray("post") : [];

        // Attempt to POST the specified Endpoint.
        $response = RestClient::post($endpoint, $data);

        // IF the response is empty, somthing went VERY wrong!
        if($response === [])
        {
            throw new EndpointException("WTF???");
            //return [];
        }

        // HANDLE ANY ERROR CODES HERE...
        if(array_key_exists("code", $response))
        {
            switch($response["code"])
            {
                case 401: throw new EndpointException("The REST Client was not authorized to make this request!");
                case 403: throw new EndpointException("The provided App Key does not have sufficient privileges!");
                case 404: throw new EndpointException("Endpoint '$endpoint' was not found for class '$class'!");
                case 422: throw new EndpointException("Data for endpoint '$endpoint' was improperly formatted!\n".
                                        $response["message"]."\n".
                                        json_encode($response["errors"], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
                                    );

                // TODO: Add other response codes, as they are encountered!

                default:  break; // Likely the key "code" from an actual Endpoint!
            }
        }

        // Finally, return the instantiated Endpoint!
        return new $class($response);
    }

    // =================================================================================================================
    // PATCH METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param null|Endpoint $data
     * @param array $params
     * @param string $suffix
     * @return null|Endpoint
     * @throws AnnotationReaderException
     * @throws EndpointException
     * @throws PatternMatchException
     * @throws RestClientException
     * @throws \MVQN\Helpers\Exceptions\ArrayHelperException
     * @throws \ReflectionException
     */
    public static function patch(?Endpoint $data, array $params = [], string $suffix = ""): ?Endpoint
    {
        // Get a reference to the type of Endpoint calling this function.
        $class = get_called_class();

        // Instantiate an AnnotationReader for this class AND check for the important parameters.
        $annotations = new AnnotationReader($class);
        $endpoints = $annotations->getParameter("endpoints");

        if(!array_key_exists("getById", $endpoints))
            throw new EndpointException("An '@endpoint { \"patch\": \"/examples/:id\" }' annotation on the ".
                "'$class' class must be declared in order to resolve this endpoint'");

        // Interpolate the URL patterns against any provided parameters.
        $endpoint = PatternMatcher::interpolateUrl($endpoints["patch"], $params);

        // Appen any provided suffixes to the URL.
        if($suffix !== "")
            $endpoint .= $suffix;

        // Get an array of all Model properties, with any that do not belong in the PATCH method removed!
        $data = ($data !== null) ? $data->toArray("patch") : [];

        // Attempt to PATCH the specified Endpoint.
        $response = RestClient::patch($endpoint, $data);

        // IF the response is empty, somthing went VERY wrong!
        if($response === [])
        {
            throw new EndpointException("WTF???");
            //return [];
        }

        // HANDLE ANY ERROR CODES HERE...
        if(array_key_exists("code", $response))
        {
            switch($response["code"])
            {
                case 401: throw new EndpointException("The REST Client was not authorized to make this request!");
                case 403: throw new EndpointException("The provided App Key does not have sufficient privileges!");
                case 404: throw new EndpointException("Endpoint '$endpoint' was not found for class '$class'!");
                case 422: throw new EndpointException("Data for endpoint '$endpoint' was improperly formatted!\n".
                    $response["message"]."\n".
                    json_encode($response["errors"], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
                );

                // TODO: Add other response codes, as they are encountered!

                default:  break; // Likely the key "code" from an actual Endpoint!
            }
        }

        // Finally, return the instantiated Endpoint!
        return new $class($response);
    }

}
