<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\Endpoints\EndpointObject;


class TestFunctions extends \PHPUnit\Framework\TestCase
{

    // =================================================================================================================
    // GLOBAL TESTS
    // -----------------------------------------------------------------------------------------------------------------

    public static function testAllGetters(EndpointObject $endpoint): bool
    {
        $class = get_class($endpoint);

        $reflection = new \ReflectionClass($endpoint);
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PROTECTED);

        echo ">>> {$class}Tests->testAllGetters()\n";

        foreach ($properties as $property) {
            $name = $property->getName();
            $func = "get" . ucfirst($name);

            $value = $endpoint->$func();

            $funcName = $reflection->getShortName()."::get".ucfirst($name)."()";

            echo ">   $funcName => ".(is_array($value) ? json_encode($value, JSON_UNESCAPED_SLASHES) : $value)."\n";
        }

        echo "\n";

        return true;
    }
}