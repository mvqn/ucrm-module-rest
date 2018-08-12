<?php
declare(strict_types=1);

namespace MVQN\Annotations;

use MVQN\Helpers\ArrayHelpers;

class AnnotationReaderException extends \Exception
{
}




class AnnotationReader
{
    protected $docblock = "";
    protected $parameters = [];
    //private $keyPattern = "[A-z0-9\_\-]+";
    //private $endPattern = "[ ]*(?:@|\r\n|\n)";
    //private $parsedAll = FALSE;
    protected $pattern = "/(?:\*)(?:[\t ]*)?@([\w\_\-]+)(?:[\t ]*)?(.*)/m";
    protected $json_pattern = "/(\{.*\})/";
    protected $array_pattern = "/ (\[.*\])/";
    protected $array_pattern_named = "/([\w\_\-]*)(?:\[\])/";

    protected $var_type_name_pattern = '/^([\w\|\[\]\_]+)\s+(?:\$(\w+))?\s*/';

    protected $type;


    /**
     * AnnotationReader constructor.
     * @param string $class
     * @param string $name
     * @param string $type
     * @throws \ReflectionException
     * @throws AnnotationReaderException
     */
    public function __construct(string $class, string $name = "", string $type = "")
    {
        $reflection = null;

        // CLASS
        if($class !== "" && $name === "" && $type === "")
        {
            $this->type = "class";
            $reflection = new \ReflectionClass($class);
        }

        // METHOD
        if($class !== "" && $name !== "" && $type === "method")
        {
            $this->type = "method";
            $reflection = new \ReflectionMethod($class, $name);
        }

        // PROPERTY
        if($class !== "" && $name !== "" && $type === "property")
        {
            $this->type = "property";
            $reflection = new \ReflectionProperty($class, $name);
        }

        if($reflection === null)
            throw new AnnotationReaderException("Invalid arguments passed to __construct(): ".print_r([
                "class" => $class,
                "name" => $name,
                "type" => $type
            ], true));

        $this->docblock = $reflection->getDocComment();

        if(!preg_match_all($this->pattern, $this->docblock, $matches))
            return;

        $params = [];

        for($i = 0; $i < count($matches[0]); $i++)
        {
            $key = $matches[1][$i];
            $value = $matches[2][$i];

            $count = 0;
            for($j = 0; $j < count($matches[0]); $j++)
            {
                if ($matches[1][$j] === $key)
                    $count++;
            }

            // Handle JSON objects!
            if(preg_match($this->json_pattern, $value, $match))
            {
                $value = json_decode($value, true);
            }
            else
            // Handle Array objects!
            if(preg_match($this->array_pattern, $value, $match))
            {
                // TODO: Determine best way to handle the cases where a property has a type of Type[]!

                // For now, we just remove the [] at the end of the type name...
                if(preg_match($this->array_pattern_named, $value, $named_match))
                    $value = str_replace("[]", "", $value);

                $value = eval("return ".$value.";");
            }

            if($count > 1)
            {
                if(!array_key_exists($key, $params))
                {
                    $params[$key] = $value;
                }
                else
                {
                    if(!is_array($value))
                        throw new AnnotationReaderException("Malformed annotation entry found: '$value'");

                    $params[$key] = array_merge($params[$key], $value);
                }
            }
            else
            {
                $params[$key] = $value;
            }

        }

        $this->parameters = $params;
    }


    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param string $key
     * @return mixed|null
     * @throws \MVQN\Helpers\ArrayHelperPathException
     */
    public function getParameter(string $key)
    {
        if(strpos($key, "/") !== false)
            return ArrayHelpers::array_path($this->parameters, $key);
        else
            return array_key_exists($key, $this->parameters) ? $this->parameters[$key] : null;
    }


    /**
     * @return array Returns an array containing any found 'types', 'name' and 'description' of the property.
     * @throws AnnotationReaderException Throws an exception if there were any issues parsing the annotations.
     */
    public function getPropertyInfo(): array
    {
        // Ensure we have the correct AnnotationReader setup!
        if($this->type !== "property")
            throw new AnnotationReaderException("AnnotationReader->getPropertyInfo() expected a 'property', but found ".
                "a '{$this->type}' instead!");

        // Get ALL of the parameters.
        $params = self::getParameters();

        // Get the line containing the '@var <type> ...' declaration.
        $var = array_key_exists("var", $params) ? $params["var"] : null;

        // Ensure the end-user has included a valid DocBlock for this property!
        if($var === null)
            throw new AnnotationReaderException("AnnotationReader->getPropertyInfo() could not find a valid ".
                "'@var <type> \$<name> <descrition>' entry in the DocBlock");

        // Initialize a collection to store the information about this property.
        $info = [];

        // IF there is a RegEx match for the 'types' and 'name'...
        if(preg_match($this->var_type_name_pattern, $var, $matches))
        {
            // THEN create an array of all of the types found.
            $info["types"] = array_map(
                function($value)
                {
                    $value = str_replace("[]", "", $value);
                    return trim($value);
                },
                array_filter(explode("|", $matches[1]))
            );

            // AND the name, if found.
            if(count($matches) > 2)
                $info["name"] = trim($matches[2]);

            // AND the description, if found.
            if(count($matches) > 3)
                $info["description"] = trim(str_replace($matches[0], "", $var));
        }

        // Finally, return the info collection!
        return $info;
    }

    public function hasParameter(string $key)
    {
        return array_key_exists($key, $this->parameters);
    }


}