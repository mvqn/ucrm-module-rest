<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;
use UCRM\REST\Exceptions\RestClientException;



/**
 * Class RestObject
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
abstract class RestObject implements \JsonSerializable
{
    /** @var string */
    protected $test;


    public function __get($name)
    {
        $class = get_called_class();

        if(method_exists($class, $name))
        {
            return $class->$name();
        }
        else
        {
            return property_exists($class, $name) ? $class->$name : null;
        }
    }

    public function __set($name, $value)
    {
        /** @var static $class */
        $class = $this;

        echo $class."\n";
        echo $name."\n";
        echo $value."\n";

        if(method_exists($class, $name))
        {
            echo "METHOD!\n";
            $class->$name($value);
        }
        else
        {
            echo "PROPERTY!\n";
            $class->$name = 1;
        }
    }





    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        // Get an array of all Model properties.
        $assoc = get_object_vars($this);

        return $assoc;
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



}