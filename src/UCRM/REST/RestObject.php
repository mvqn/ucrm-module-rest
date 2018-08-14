<?php
declare(strict_types=1);

namespace UCRM\REST;

use MVQN\Annotations\{AnnotationReader,Exceptions\AnnotationReaderException};
use MVQN\Collections\Collectible;
use MVQN\Helpers\ArrayHelper;

use UCRM\REST\Endpoints\Lookups\Lookup;
use UCRM\REST\Exceptions\RestObjectException;

/**
 * Class RestObject
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
abstract class RestObject extends Collectible implements \JsonSerializable
{

    // =================================================================================================================
    // CONSTANTS
    // -----------------------------------------------------------------------------------------------------------------

    /** @var string The root namespace of Lookup classes. */
    private const LOOKUP_NAMESPACE = __NAMESPACE__."\\Endpoints\\Lookups";

    /** @var string A string delimiter to use when @keepNull and @keepNullElements annotations are used. */
    private const NULL_DELIMITER = "#NULL#";

    // =================================================================================================================
    // MAGIC METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        // Add each provided key as a property with the given value to this object...
        foreach($values as $key => $value)
            $this->$key = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Overrides the default string representation of the class.
     *
     * @return string Returns a JSON representation of this Model.
     */

    public function __toString()
    {
        // Return the array as a JSON string.
        return json_encode($this, JSON_UNESCAPED_SLASHES);
    }

    // =================================================================================================================
    // INTERFACE IMPLEMENTATIONS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Specify data which should be serialized to JSON.
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed Data which can be serialized by <b>json_encode</b>, as a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        // Get an array of all Model properties.
        $assoc = get_object_vars($this);

        // Move ID to the first element in the array for readability.
        if(array_key_exists("id", $assoc))
            $assoc = ["id" => $assoc["id"]] + $assoc;

        // Return the array!
        return $assoc;
    }

    // =================================================================================================================
    // PREPARATION METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Converts the RestObject to it's JSON representation, removing and values that should not be provided given the
     * specified HTTP method/verb and optionally removing all null fields not specifically annotated with '@keepNull' or
     * '@keepNullElements'.
     *
     * @param string $method The HTTP method/verb for which to examine each property for exclusion.
     * @param bool $filter A flag to request the resulting JSON be stripped of fields containing null values.
     * @param int $options Any optional <b>json_encode</b> options to be used.
     * @return string Returns a JSON string prepared for provision to any HTTP REST request body.
     * @throws AnnotationReaderException Throws an exception if any errors occurred during parsing of the annotations.
     * @throws RestObjectException Throws an exception if any errors occurred during the preparation process.
     * @throws \ReflectionException Throws an exception if any errors occurred while using the Reflection engine.
     */
    public function toJSON(string $method = "", bool $filter = true, int $options = 0): string
    {
        // Create a list of the builtin types.
        $types = ["int", "string", "float", "bool", "null", "array", "resource"];

        // Setup the Reflection instance for the calling class.
        $class = get_called_class();
        $reflection = new \ReflectionClass($class);

        // Get an array of all Model properties, via Reflection.
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PROTECTED);

        // Initialize a new collection to store only the desired fields for this JSON object.
        $fields = [];

        foreach($properties as $property)
        {
            // Get the name of this property.
            $name = $property->getName();

            // Create an AnnotationReader for this property and get all of it's annotations.
            $annotations = new AnnotationReader($class, $name, "property");
            $params = $annotations->getParameters();

            // Get the information for this property, specifically the type!
            $info = $annotations->getPropertyInfo();

            // ERROR if we are unable to find the 'types' part of the DocBlock!
            if(!array_key_exists("types", $info))
                throw new AnnotationReaderException("Unable to successfully parse the DocBlock for '$name'");

            // Set the 'type' from the property info collection.
            $type = $info["types"][0];

            // IF the current property has either the '@<method>' or '@<method>-required' or we want all properties...
            if(array_key_exists($method, $params) || array_key_exists($method."-required", $params) || $method === "")
            {
                // IF the $type is valid and is not in the array of built-in types...
                if($type !== null && !in_array($type, $types))
                {
                    // THEN determine the FQCN for the 'type' and the the 'Lookup' classes.
                    $type = self::LOOKUP_NAMESPACE."\\$type";
                    $base = self::LOOKUP_NAMESPACE."\\Lookup";

                    // IF the current property's type is a child of 'Lookup'...
                    if(is_subclass_of($type, $base, true))
                    {
                        // THEN generate the getter name for the correct function.
                        $func = "get".ucfirst($name);

                        // AND execute the getter to retreive the value.
                        $children = $this->$func();

                        // Check to see if the resulting value is NULL and skip this iteration if so...
                        if($children === null)
                            continue;

                        // Loop through each child class object...
                        foreach($children as $child)
                        {
                            /** @var Lookup $child */

                            // IF the current child's value is NOT an array...
                            if(!is_array($child))
                            {
                                // AND the value is NOT null...
                                if($child !== null)
                                {
                                    // THEN run this method recursively on this child object.
                                    $assoc = json_decode($child->toJSON($method), true);

                                    // IF the '@keepNullElements' annotation has been set
                                    // AND this would be an empty array...
                                    if(array_key_exists("keepNullElements", $params) && array_filter($assoc) === [])
                                        // THEN add the NULL delimiter string as a placeholder.
                                        $fields[$name][] = self::NULL_DELIMITER;
                                    else
                                        // OTHERWISE simply add the array as the current field.
                                        $fields[$name][] = $assoc;
                                }
                                else
                                    // OTHERWISE simply add null to the current field.
                                    $fields[$name][] = null;
                            }
                            else
                            {
                                // OTHERWISE, the child is an Array and we should create a Lookup class for it!

                                // We should NEVER reach this block, in theory!
                                throw new RestObjectException("An array was found for which a Lookup class should be ".
                                    "created: ".print_r($child, true));
                            }
                        }
                    }
                    else
                    {
                        // OTHERWISE, the child is a class object that we did not expect to encounter or for which we
                        // forgot to extend the Lookup class.

                        // We should NEVER reach this block, in theory!
                        throw new RestObjectException("An object was found that does not extend from Lookup: $type");
                    }
                }
                else
                {
                    // OTHERWISE, we have a built-in type...

                    $property->setAccessible(true);
                    $value = $property->getValue($this);

                    // Simply append the property as the current field.
                    $fields[$name] = $value;
                }
            }
        }

        // If set to be filtered, do so now, which will recursively remove all keys with null values.
        $fields = $filter ? ArrayHelper::array_filter_recursive($fields) : $fields;

        // Convert the array to JSON.
        $json = json_encode($fields, $options);

        // Now replace any occurrences of the NULL delimiter with the actual 'null' value.
        $json = str_replace("\"".self::NULL_DELIMITER."\"", "null", $json);

        // Finally, return the JSON string.
        return $json;
    }

    /**
     * Converts the RestObject to it's associative array representation, removing and values that should not be provided
     * given the specified HTTP method/verb and optionally removing all null fields not specifically annotated with
     * '@keepNull' or '@keepNullElements'.
     *
     * @param string $method The HTTP method/verb for which to examine each property for exclusion.
     * @param bool $filter A flag to request the resulting JSON be stripped of fields containing null values.
     * @return array Returns an associative array prepared for provision to any HTTP REST request body.
     * @throws AnnotationReaderException Throws an exception if any errors occurred during parsing of the annotations.
     * @throws RestObjectException Throws an exception if any errors occurred during the preparation process.
     * @throws \ReflectionException Throws an exception if any errors occurred while using the Reflection engine.
     */
    public function toArray(string $method = "", bool $filter = false): array
    {
        $json = $this->toJSON($method, $filter, 0);
        $assoc = json_decode($json, true);
        return $assoc;
    }

    // =================================================================================================================
    // VALIDATION METHODS
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Checks to determine the validity of a RestObject, by comparing each properties value to NULL, when it has been
     * annotated with either '@<method>' or '@<method>-required'.
     *
     * @param string $method The HTTP method/verb for which to examine each property for validity.
     * @param array|null $missing A reference array used to store the missing/unset properties for later use.
     * @return bool Returns TRUE if all required properties have a value set, otherwise FALSE.
     * @throws AnnotationReaderException Throws an exception if any errors occurred during parsing of the annotations.
     * @throws \ReflectionException Throws an exception if any errors occurred while using the Reflection engine.
     */
    public function validate(string $method, array &$missing = null): bool
    {
        // Setup the Reflection instance for the calling class.
        $class = get_called_class();
        $reflection = new \ReflectionClass($class);

        // Get an array of all Model properties, via Reflection.
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PROTECTED);

        // Initialize a collection to store missing entries.
        $missing = [];

        // Loop through each property of the protected properties...
        foreach($properties as $property)
        {
            // Get the name of the property.
            $name = $property->getName();

            // Create an AnnotationReader to parse the annotations for this property and get the list of annotations.
            $annotations = new AnnotationReader($class, $name, "property");
            $params = $annotations->getParameters();

            // IF this is a required property, per the use of '@<method>-required'...
            if(array_key_exists($method."-required", $params))
            {
                // THEN set the property accessible for this test only.
                $property->setAccessible(true);

                // Get the actual value of this property instance.
                $value = $property->getValue($this);

                // IF the value of this property is NULL, THEN we need to mark it as missing.
                if($value === null)
                    $missing[] = $name;
            }
        }

        // If there are any required properties missing, then return false!
        return ($missing === []);
    }

    /**
     * Creates a minimalistic version of the RestObject by removing any fields that are not flagged as required by an
     * annotation of '@<method>-required'.
     *
     * @param string $method The HTTP method/verb for which to examine each property for exclusion.
     * @param array|null $excluded A reference array used to store the excluded properties for later use.
     * @param array $exceptions An optional array of exceptions to be included even without the proper annotations.
     * @return RestObject Returns the newly minimalized RestObject, which has any non-required fileds set to null.
     * @throws AnnotationReaderException
     * @throws RestObjectException
     * @throws \ReflectionException
     *
     * @deprecated
     * @todo Determine if this method is really necessary and complete it as needed!
     */
    public function minimal(string $method, array &$excluded = null, array $exceptions = [ "id" ]): RestObject
    {
        $supported = [ "post", /*"put",*/ "patch" ];

        if(!in_array($method, $supported))
            throw new RestObjectException("The '$method' method is not currently supported by RestObject::minimal()\n");

        // Setup the Reflection instance for the calling class.
        $class = get_called_class();
        $reflection = new \ReflectionClass($class);

        // Get an array of all Model properties, via Reflection.
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PROTECTED);

        $excluded = [];

        // Loop through each property of the protected properties...
        foreach($properties as $property)
        {
            // Get the name of the property.
            $name = $property->getName();

            // Create an AnnotationReader to parse the annotations for this property and get the list of annotations.
            $annotations = new AnnotationReader($class, $name, "property");
            $params = $annotations->getParameters();

            // Set the property accessible for this test only.
            $property->setAccessible(true);

            // IF this is a required property, per the use of '@<method>-required'...
            if(array_key_exists($method."-required", $params) || in_array($name, $exceptions))
            {
                // THEN get the value of this property.
                $value = $property->getValue($this);

                // And add it to the list of missing properties, as needed.
                if($value === null)
                    $excluded[] = $name;
            }
            else
            {
                // OTHERWISE set it to NULL to be filtered out later.
                $property->setValue($this, null);

            }
        }

        // Finally, return THIS!
        return $this;
    }

}