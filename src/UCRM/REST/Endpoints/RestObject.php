<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\Helpers\ArrayHelpers;
use Nette\PhpGenerator\Helpers;
use UCRM\REST\RestClient;
use UCRM\REST\Exceptions\RestClientException;
use MVQN\Annotations\AnnotationReader;


/**
 * Class RestObject
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
abstract class RestObject implements \JsonSerializable
{


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
        //$assoc = array_filter($assoc);

        // Return the array as a JSON string.
        return json_encode($assoc, JSON_UNESCAPED_SLASHES);
    }





    /**
     * @param string $method
     * @param int $options
     * @param bool $filter
     * @return string
     * @throws \ReflectionException
     */
    public function toFields(string $method = "", int $options = 0, bool $filter = false): string
    {
        // Create a list of the builtin
        $types = ["int", "string", "float", "bool", "null", "array", "resource"];

        // Get an array of all Model properties.
        $assoc = get_object_vars($this);

        $class = get_called_class();
        $reflection = new \ReflectionClass($class);

        // Get an array of all Model properties, via Reflection.
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PROTECTED);

        $fields = [];

        foreach($properties as $property)
        {
            $name = $property->getName();

            $annotations = new AnnotationReader($class, $name, "property");
            $params = $annotations->getParameters();

            $type = $params;
            $type = ($type !== null) && array_key_exists("var", $params) ? $params["var"] : null;
            $type = ($type !== null) ? explode(" ", $type) : null;
            $type = ($type !== null) ? explode("|", $type[0]) + array_slice($type, 1, count($type) - 1) : null;
            $type = ($type !== null) ? array_map(function($val) { return str_replace("[]", "", $val); }, $type) : null;
            $type = ($type !== null) ? array_map("trim", $type) : null;
            $type = ($type !== null) ? $type[0] : null;

            if(array_key_exists($method, $params) || $method === "")
            {
                if($type !== null && !in_array($type, $types))
                {
                    $type = __NAMESPACE__."\\$type";
                    $base = __NAMESPACE__."\\Lookup";

                    if(is_subclass_of($type, $base, true))
                    {
                        $func = "get".ucfirst($name);

                        // LOOKUP!
                        $subs = $this->$func();

                        //echo count($subs)."\n";

                        foreach($subs as $sub)
                        {
                            /** @var Lookup $sub */
                            if(!is_array($sub))
                            {
                                $fields[$name][] = json_decode($sub->toFields($method), true);
                            }
                            else
                            {
                                foreach($sub as $s)
                                    echo $s."\n";
                                    //$fields[$name][] = $s->toFields($method);

                                //$fields[$name][] = $sub;
                            }

                        }


                    }


                }
                else
                    $fields[$name] = $assoc[$name];
            }
        }

        $fields = $filter ? ArrayHelpers::array_filter_recursive($fields) : $fields;

        return json_encode($fields, $options);
    }







}