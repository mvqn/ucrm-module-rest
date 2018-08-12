<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\Collections\Collection;
use UCRM\REST\RestClient;

class TestFunctions extends \PHPUnit\Framework\TestCase
{
    // =================================================================================================================
    // TESTS
    // -----------------------------------------------------------------------------------------------------------------

    public static function testAllGetters(Endpoint $endpoint): bool
    {
        $class = get_class($endpoint);

        $reflection = new \ReflectionClass($endpoint);
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PROTECTED);

        echo ">>> {$class}Tests->testAllGetters()\n";

        foreach ($properties as $property) {
            $name = $property->getName();
            $func = "get" . ucfirst($name);

            $value = $endpoint->$func();

            if (is_array($value))
                echo ">   {$reflection->getShortName()}::get" . ucfirst($name) . "() => " . json_encode($value, JSON_UNESCAPED_SLASHES) . "\n";
            else
                echo ">   {$reflection->getShortName()}::get" . ucfirst($name) . "() => $value\n";
        }

        echo "\n";

        return true;
    }
}