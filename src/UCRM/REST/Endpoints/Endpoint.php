<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;
use UCRM\REST\Exceptions\RestClientException;



/**
 * Class Country
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
abstract class Endpoint
{
    /** @const string  */
    protected const ENDPOINT = "";
    /** @const string  */
    protected const ENDPOINT_PARENT = "";





    /**
     * Endpoint constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        foreach($values as $key => $value)
            $this->$key = $value;

    }



    /**
     * Overrides the default string representation of the class.
     *
     * @return string Returns a JSON representation of this Model.
     */
    public function __toString()
    {
        // Get an array of all Model properties.
        $assoc = get_object_vars($this);

        // Remove any that contain NULL values.
        $assoc = array_filter($assoc);

        // Return the array as a JSON string.
        return json_encode($assoc, JSON_UNESCAPED_SLASHES);
    }



    private static function isAssoc(array $array): bool
    {
        return array_keys($array) !== range(0, count($array) - 1);
    }



    /**
     * @return Endpoint[]
     * @throws RestClientException
     */
    public static function get(): array
    {
        /** @var Endpoint $child */
        $child = get_called_class();
        $endpoint = $child::ENDPOINT;
        $endpoint_parent = defined("$child::ENDPOINT_PARENT") ? $child::ENDPOINT_PARENT : "";

        if($endpoint_parent !== "")
            throw new RestClientException(
                "'$endpoint' is a child endpoint and must be called using it's parent endpoint of '".
                $endpoint_parent."/{id}$endpoint'");

        $response = RestClient::get($endpoint);

        //$objects = json_decode($response, true);

        if(self::isAssoc($response))
            //return new $child($response);
            return [new $child($response)];

        $endpoints = [];
        foreach($response as $object)
            $endpoints[] = new $child($object);

        return $endpoints;
    }


    public static function getById(int $id): ?EndPoint
    {
        /** @var Endpoint $child */
        $child = get_called_class();
        $endpoint = $child::ENDPOINT;
        $endpoint_parent = defined("$child::ENDPOINT_PARENT") ? $child::ENDPOINT_PARENT : "";

        if($endpoint_parent !== "")
            $endpoint = $endpoint_parent.$endpoint;

        $response = RestClient::get($endpoint."/$id");

        $endpoint = new $child($response);

        return $endpoint;



    }



}