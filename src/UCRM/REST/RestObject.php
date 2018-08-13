<?php
declare(strict_types=1);

namespace UCRM\REST;

use MVQN\Annotations\{AnnotationReader,Exceptions\AnnotationReaderException};
use MVQN\Collections\Collectible;
use MVQN\Helpers\ArrayHelper;

use UCRM\REST\Exceptions\RestObjectException;

/**
 * Class RestObject
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 */
abstract class RestObject extends Collectible implements \JsonSerializable
{

    /**
     * RestObject constructor.
     *
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        foreach($values as $key => $value)
            $this->$key = $value;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Specify data which should be serialized to JSON.
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
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

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param string $method
     * @param int $options
     * @param bool $filter
     * @return string
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \ReflectionException
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
                    $type = __NAMESPACE__."\\$type";
                    $base = __NAMESPACE__."\\Lookup";

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
                                // THEN decode and add the child object to the collection.
                                if($child !== null)
                                    $fields[$name][] = json_decode($child->toJSON($method), true);
                                else
                                    $fields[$name][] = null;
                            }
                            else
                            {
                                // OTHERWISE, The child is an Array!


                                //foreach($child as $s)
                                //    echo $s."\n";
                                    //$fields[$name][] = $s->toFields($method);

                                $fields[$name][] = $child;
                            }

                        }


                    }
                }
                else
                {
                    // OTHERWISE, we have a built-in type...

                    $property->setAccessible(true);
                    $value = $property->getValue($this);

                    $fields[$name] = $value; // $assoc[$name];
                }
            }
        }

        $fields = $filter ? ArrayHelper::array_filter_recursive($fields) : $fields;

        return json_encode($fields, $options);
    }

    /**
     * @param string $method
     * @param bool $filter
     * @return array
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \ReflectionException
     */
    public function toArray(string $method = "", bool $filter = false): array
    {
        $json = $this->toJSON($method, $filter, 0);
        $assoc = json_decode($json, true);
        return $assoc;
    }


    /**
     * @param string $class
     * @param RestObject[] $array
     * @param int[]|null $set
     * @param bool $reindex
     * @return RestObject[]|null
     */
    protected function getCollection(string $class, array $array, ?array $set = null, bool $reindex = false): ?array
    {
        if($array === null)
            return null;

        if($set === null)
        {
            $fullset = [];
            foreach($array as $index => $value)
                $fullset[] = $index;

            $set = $fullset;
        }

        $collection = [];
        foreach($set as $index)
        {
            //if($index === 0)
                //echo "TEST";

            //if(!is_array($array[$index]))
            //    echo "TEST";

            $collection[$index] = ($array[$index] !== null) ? new $class($array[$index]) : null;
        }

        return $reindex ? array_values($collection) : $collection;
    }


    /**
     * @param string $class
     * @param RestObject[] $array
     * @param int $id
     * @param int|null $index
     * @return RestObject|null
     * @throws RestObjectException
     */
    public function getCollectionItemById(string $class, array $array, int $id, int &$index = null): ?RestObject
    {
        $index = -1;

        for($i = 0; $i < count($array); $i++)
        {
            if(!array_key_exists("id", $array[$i]))
                throw new RestObjectException("The collection items must have an \$id property for ".
                    "'RestObject->getCollectionItemById()' to work!");

            if(!is_subclass_of($class, __NAMESPACE__."\\RestObject", true))
                throw new RestObjectException("The \$class parameter must be a child of RestObject!");

            if($array[$i]["id"] === $id)
            {
                $index = $i;
                return ($array[$i] !== null) ? new $class($array[$i]) : null;
            }
        }

        return null;
    }


    /**
     * @param string $class
     * @param array $array
     * @param array $values
     * @return RestObject
     */
    public function setCollection(string $class, array &$array, array $values): RestObject
    {
        foreach($values as $index => $value)
        {


            if(is_array($value)) // ARRAY
                $array[$index] = $value;
            else
            if(is_object($value)) // OBJECT
                $array[$index] = $value->toArray();
            else
            if(is_string($value)) // JSON?
            {
                $assoc = json_decode($value, true);

                if($assoc !== null)
                    $array[$index] = $assoc;
                else
                    $array[$index] = $value;
            }
            else
                $array[$index] = $value;
        }

        return $this;
    }


    /**
     * @param string $class
     * @param array $array
     * @param int $id
     * @param RestObject $object
     * @return RestObject
     * @throws RestObjectException
     */
    public function setCollectionItemById(string $class, array &$array, int $id, RestObject $object): RestObject
    {
        $current = $this->getCollectionItemById($class, $array, $id, $index);
        $this->setCollection($class, $array, [ $index => $object ]);

        return $this;
    }


    /**
     * Checks to determine the validity of a RestObject, by comparing each properties value to NULL, when it has been
     * annotated with '@<method>-required'.
     *
     * @param string $method The HTTP method for which to check validity.
     * @param array|null $missing A reference array used to store the missing/unset properties.
     * @return bool Returns TRUE if all required properties have a value set.
     * @throws AnnotationReaderException Throws an exception if the AnnotationReader encounters any errors.
     * @throws \ReflectionException Throws an exception if the Reflection engine encounters any errors.
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
            // get the name of the property.
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



    public function minimal(string $method, array &$missing = null, array $exceptions = [ "id" ]): RestObject
    {
        $supported = [ "post", /*"put",*/ "patch" ];

        if(!in_array($method, $supported))
            throw new RestObjectException("The '$method' method is not currently supported by RestObject::minimal()\n");

        // Setup the Reflection instance for the calling class.
        $class = get_called_class();
        $reflection = new \ReflectionClass($class);

        // Get an array of all Model properties, via Reflection.
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PROTECTED);

        $missing = [];

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
                    $missing[] = $name;
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