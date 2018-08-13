<?php
declare(strict_types=1);

namespace MVQN\Helpers;

use MVQN\Helpers\Exceptions\ArrayHelperException;

/**
 * Class ArrayHelper
 *
 * @package MVQN\Helpers
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class ArrayHelper
{


    public static function is_assoc(array $array): bool
    {
        return array_keys($array) !== range(0, count($array) - 1);
    }


    public static function array_path(array $array, string $path)
    {
        $steps = explode("/",$path);
        $current = $array;

        foreach ($steps as $step)
        {
            if (!is_array($current) || !array_key_exists($step, $current))
                throw new ArrayHelperException("Could not traverse the path '$path' in ".print_r($array, true));

            $current = $current[$step];
        }

        return $current;


    }





    /**
     * @param callable $callback The callback function to execute on every iteration of the traversal.
     * @param array $array An input array for which to traverse, recursively.
     * @return array Returns the mapped array.
     */
    public static function array_map_recursive(callable $callback, array $array): array
    {
        $func = function ($item) use (&$func, &$callback)
        {
            return is_array($item) ? array_map($func, $item) : call_user_func($callback, $item);
        };

        return array_map($func, $array);
    }

    /**
     * @param array $input An input array for which to traverse, recursively.
     * @param callable|null $callback An optional callback function, if none then simply filter our NULL values.
     * @return array Returns the filtered array.
     */
    public static function array_filter_recursive(array $input, callable $callback = null): array
    {
        foreach ($input as &$value)
        {
            if (is_array($value))
            {
                $value = self::array_filter_recursive($value, $callback);
            }
        }

        return $callback !== null ? array_filter($input, $callback) : array_filter($input);
    }





}