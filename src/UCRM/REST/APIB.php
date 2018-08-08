<?php
declare(strict_types=1);

namespace UCRM\REST;

use function foo\func;
use UCRM\REST\Exceptions\RestClientException;



/**
 * Class APIB
 *
 * @package UCRM\REST
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 * @internal
 */
final class APIB
{
    private const APIB_URL =
        "https://ucrm.docs.apiary.io/api-description-document";

    private const APIB_URL_BETA =
        "https://ucrmbeta.docs.apiary.io/api-description-document";

    public const APIB_PATH =
        __DIR__."/Blueprints/";



    public static function download(bool $beta = false): string
    {
        $http = $beta ? self::APIB_URL_BETA : self::APIB_URL;
        $file = self::APIB_PATH.($beta ? "ucrmbeta.apib" : "ucrm.apib");

        $contents = file_get_contents($http);

        file_put_contents($file, $contents, LOCK_EX);

        return $contents;
    }

    public static function load(bool $beta = false): string
    {
        //$http = $beta ? self::APIB_URL_BETA : self::APIB_URL;
        $file = self::APIB_PATH."ucrm".($beta ? "beta" : "").".apib";

        $contents = file_get_contents($file);

        return $contents;
    }

    public static function save(string $contents, bool $beta = false): string
    {
        //$http = $beta ? self::APIB_URL_BETA : self::APIB_URL;
        $file = self::APIB_PATH."ucrm".($beta ? "beta" : "").".apib";

        file_put_contents($file, $contents, LOCK_EX);

        return $contents;
    }







    private static function line_unshift(string &$contents, $delimiter = "\n", bool $eol = false): string
    {
        $length = strpos($contents, $delimiter) + ($eol ? strlen($delimiter) : 0);
        $result = substr($contents, 0, $length);
        $contents = substr($contents, $length + (!$eol ? strlen($delimiter) : 0), strlen($contents) - ($length + (!$eol ? strlen($delimiter) : 0)));

        return $result;
    }

    /*

    private static function handleBlock(string $block): array
    {
        $block = trim($block);

        // ## Class (object)\n
        $class_line = self::line_unshift($block);
        preg_match("/^## (\w+) \(object\)/", $class_line, $class_match);

        $class_name = $class_match[1];
        $properties = [];

        $entries = array_map(function($value) { return "+$value";}, array_filter(explode("\n+", "\n".$block)));

        foreach($entries as $entry)
        {
            // Parses as described below:
            // + name: `example` (type[, required[, nullable]]) - description\n
            if(preg_match("/^\+ (.+): `(.+)`(?: \((.+)\))? - (.+)$/", $entry, $property_match) !== 0)
            {
                list($full, $name, $example, $type, $description) = array_map(
                    function($value) { return ($value === null || $value === "") ? "~" : $value; },
                    array_values($property_match));

                $assoc = [
                    //"name" => $name,
                    "example" => $example,
                    "type" => $type,
                    "description" => $description
                ];

                $properties[$name] = $assoc;

                continue;
            }
            else
            // Parses as described below, but only when not followed by additional content or a sub-entry:
            // + name\n
            if(preg_match("/^\+ (\w+)$(?!\+)/", $entry, $property_match) !== 0)
            {
                list($full, $name) = array_map(
                    function($value) { return ($value === null || $value === "") ? "~" : $value; },
                    array_values($property_match));

                $assoc = [
                    //"name" => $name,
                ];

                $properties[$name] = $assoc;

                continue;
            }


            //print_r($entry);


        }

        //echo "\n";

        //var_dump($entries);


        //echo str_replace("\n", "~", $block)."\n";

        $class[$class_name] = $properties;

        echo json_encode($class, JSON_UNESCAPED_SLASHES)."\n";




        //echo $block;

        return [];
    }



    public static function findObjects(bool $beta = false)
    {
        $file = self::APIB_PATH.($beta ? "ucrmbeta.apib" : "ucrm.apib");

        $contents = file_get_contents($file);
        $startpos = strpos($contents, "\n# Data Structures") + 22;
        $contents = substr($contents, $startpos, strlen($contents) - $startpos -1);

        // Split the blocks and then readd the ## for RegEx matching!
        $blocks = explode("##", $contents);
        $blocks = array_map(function($value) { return "##$value"; }, $blocks);

        self::handleBlock($blocks[0]);
        self::handleBlock($blocks[1]);
        self::handleBlock($blocks[9]);

        return;

        //$block_pattern = '/^## (\w+) \(object\)\s([\s|\w|.|\+|:|`|\(|\)|\-|,|%|\"|\[|\]|\#|\/]+)##/m';
        $block_pattern = "/^##[\w|\s|.|\(|\)|+|:|`|,|\[|\]|#|\/|\-|\"|]*(?=##)/m";

        preg_match_all($block_pattern, $contents, $matches);

        print_r($matches);

        $objects = [];

        foreach($matches[0] as $match)
        {


            $class_pattern = "/^## (\w+) \(object\)$/m";
            preg_match($class_pattern, $match, $class_match);

            $class = $class_match[1];
            $match = str_replace($class_match[0], "", $match);

            //echo ">>>\n";
            //print_r($match);

            $single_pattern = "/^\+ (\w+): `(.+)` ?\(?([\w|,| |\[|\]|\"]*)\)? ?-? ?(.+)?$/m";
            preg_match_all($single_pattern, $match, $single_matches);

            //print_r($single_matches);




            $properties = [];
            for($i = 0; $i < count($single_matches[0]); $i++)
            {
                //echo $single_matches[0][$i]."\n";
                //$match = str_replace($single_matches[0][$i], "", $match);
                //echo $class."\n";
                //print_r($match);
                //$match = str_replace("code", "", $match);

                $property = [];
                $property["name"] = $single_matches[1][$i];
                //$name = $single_matches[1][$i];
                $property["example"] = $single_matches[2][$i];
                $type = $single_matches[3][$i];

                $type_parts = explode(",", $type);
                $type_parts = array_map("trim", $type_parts);

                //print_r($type_parts);

                if(in_array("required", $type_parts))
                {
                    $property["required"] = true;
                    unset($type_parts[array_search("required", $type_parts)]);
                    $type_parts = array_values($type_parts);
                }
                else
                {
                    $property["required"] = false;
                }

                if(in_array("nullable", $type_parts))
                {
                    $property["nullable"] = true;
                    unset($type_parts[array_search("nullable", $type_parts)]);
                    $type_parts = array_values($type_parts);
                }
                else
                {
                    $property["nullable"] = false;
                }

                if(in_array("optional", $type_parts))
                {
                    $property["optional"] = true;
                    unset($type_parts[array_search("optional", $type_parts)]);
                    $type_parts = array_values($type_parts);
                }
                else
                {
                    $property["optional"] = false;
                }


                if(count($type_parts) === 0)
                {
                    $property["type"] = "string";
                }

                if(count($type_parts) === 1)
                {
                    $property["type"] = $type_parts[0];
                }

                if(count($type_parts) > 1)
                {
                    $property["type"] = "UNKNOWN: (".implode(", ", $type_parts).")";
                }

                $property["description"] = $single_matches[4][$i];
                $properties[$property["name"]] = $property;
            }
            //print_r($properties);

            //print_r($match);

            $objects[$class] = $properties;
        }

        //print_r($objects);

    }

    */
    // ^## (\w+) \(object\)\s([\s|\w|.|\+|:|`|\(|\)|\-|,|%]+)

    // ^## (\w+) \(object\)\s\+ (\w+): `([\w\s]+)` *\((.+)\)\s







    public static function parse(string $apib, bool $beta = false, bool $cache = true): string
    {
        $file = self::APIB_PATH.($beta ? "ucrmbeta.json" : "ucrm.json");

        //$contents = file_get_contents($file);





        // Create a cURL session.
        $curl = curl_init();

        // Set the options necessary for communicating with the UCRM Server.
        curl_setopt($curl, CURLOPT_URL, "https://api.apiblueprint.org/parser");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $apib);


        // TODO: Determine if we EVER need to use HTTPS and how to handle it correctly here!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); // DEFAULT
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1); // DEFAULT

        // Set the necessary HTTP HEADERS.
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-Type: text/vnd.apiblueprint",
            "Accept: application/vnd.refract.parse-result+json"
        ]);

        $result = curl_exec($curl);

        $result = json_decode($result);
        $result = json_encode($result, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

        // Check to determine if the result should be cached...
        if($cache && (!file_exists($file) || file_get_contents($file) !== $result))
            file_put_contents(self::APIB_PATH.($beta ? "ucrmbeta.json" : "ucrm.json"), $result);

        //echo $result;

        return $result;
    }


    public static function toArray(bool $beta = true): array
    {
        $file = self::APIB_PATH.($beta ? "ucrmbeta.json" : "ucrm.json");

        $contents = file_get_contents($file);

        $assoc = json_decode($contents, true);

        return $assoc;
    }


    private const EMPTY_STRING_IF_ERRORS = [__CLASS__, "emptyStringIfErrors"];

    private static function emptyStringIfErrors($value)
    {
        return ($value === null) ? "" : $value;
    }


    private static function get(array $entry, string $path, callable $handler = self::EMPTY_STRING_IF_ERRORS)
    {
        $steps = explode("/",$path);
        $current = $entry;

        foreach ($steps as $step)
        {
            if (!is_array($current) || !array_key_exists($step, $current))
                return ($handler !== null) ? $handler(null) : null;

            $current = $current[$step];
        }

        return ($handler !== null) ? $handler($current) : $current;
    }




    public static function findObjects(string $apib): array
    {
        $assoc = json_decode($apib, true);

        // Data Structures
        $entries = $assoc["content"][0]["content"][38]["content"];

        $classes = [];
        $enums = [];

        foreach($entries as $entry) // Line 40434 - Array of Start!
        {
            foreach($entry["content"] as $object) // Line 40437 - Array of dataStructures!
            {
                $element = self::get($object, "element");

                if($element === "enum") // ENUM Found, as Lookup???
                {
                    $name = self::get($object, "meta/id");
                    $type = self::get($object, "content/0/element");

                    if(count(self::get($object, "content")) === 1)
                        throw new \Exception();

                    $values = [];

                    for($i = 1; $i < count(self::get($object, "content")); $i++)
                    {
                        $item = self::get($object, "content/$i");
                        $values[self::get($item, "content")] = self::get($item, "meta/description");
                    }

                    $enums[$name] = [
                        "type" => $type,
                        "values" => $values
                    ];

                    echo "> $name: ".json_encode($enums[$name], JSON_UNESCAPED_SLASHES | JSON_FORCE_OBJECT)."\n";

                    continue;
                }

                // OBJECT
                if($element === "object")
                {
                    $class_name = self::get($object, "meta/id");
                    $properties = array_key_exists($class_name, $classes) ? $classes[$class_name] : [];

                    foreach (self::get($object, "content") as $property)
                    {
                        $property_type = self::get($property, "element");

                        // OBJECT/REF
                        if ($property_type === "ref")
                        {
                            $properties["href"] = self::get($property, "content/href");
                            $classes[$class_name] = $properties;
                            continue;
                        }

                        // OBJECT/MEMBER
                        if($property_type === "member")
                        {
                            $name = self::get($property, "content/key/content");
                            $type = self::get($property, "content/value/element");

                            $values = [];

                            if ($type === "enum")
                            {
                                // REQUIRED
                                $required = self::get($property, "attributes/typeAttributes/0",
                                    function ($value) { return $value === "required"; });

                                // EXAMPLE
                                $example = self::get($property, "content/value/attributes/samples/0/0/content");

                                // DEFAULT
                                $default = self::get($property, "content/value/attributes/default/0/content");
                                $enum_type = self::get($property, "content/value/attributes/default/0/element");

                                // VALUES
                                for ($i = 0; $i < count(self::get($property, "content/value/content")); $i++)
                                {
                                    $item = self::get($property, "content/value/content/$i");

                                    if (!array_key_exists("meta", $item))
                                        $values[] = $item["content"];
                                    else
                                        $values[$item["content"]] = $item["meta"]["description"];
                                }


                            }
                            else
                            {
                                // REQUIRED
                                $required = self::get($property, "attributes/typeAttributes/0",
                                    function ($value) { return ($value === null) ? false : $value === "required"; });

                                // EXAMPLE
                                $example = self::get($property, "content/value/content");

                                // DEFAULT
                                $default = self::get($property, "content/value/attributes/default");

                                // DESCRIPTION
                                $description = self::get($property, "meta/description");
                            }

                            $properties[$name] = [
                                "type" => $type,
                                "example" => $example,
                                "description" => $description,
                                "required" => $required
                            ];

                            if ($default !== "")
                                $properties[$name]["default"] = $default;
                            if ($default !== "")
                                $properties[$name]["values"] = $values;


                            $classes[$class_name] = $properties;
                        }
                    }

                    //if(array_key_exists($class_name, $classes))
                    echo $class_name.": ".json_encode($classes[$class_name], JSON_UNESCAPED_SLASHES)."\n";

                }
            }

        }

        //echo json_encode($classes, JSON_UNESCAPED_SLASHES)."\n";
        //echo json_encode($enums, JSON_UNESCAPED_SLASHES)."\n";

        return ["classes" => $classes, "enums" => $enums];
    }





}