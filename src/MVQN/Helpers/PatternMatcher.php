<?php
declare(strict_types=1);

namespace MVQN\Helpers;




class PatternMatchException extends \Exception
{
}



final class PatternMatcher
{


    /**
     * @param string $pattern
     * @param array $params
     * @param array $tokens
     * @return string
     * @throws PatternMatchException
     */
    public static function interpolateUrl(string $pattern, array $params, string $token = ":"): string
    {

        if ($pattern === null || $pattern === "")
            return "";

        if ($token === null || $token === "")
            throw new PatternMatchException("A TOKEN must be provided to pattern match!");

        if (strpos($pattern, " ") !== false)
            throw new PatternMatchException("The \$pattern must not contain any spaces!");

        $segments = [];

        if (strpos($pattern, $token) !== false)
        {
            $parts = explode("/", $pattern);

            //print_r($parts);

            $counter = 0;

            foreach($parts as $part)
            {
                if($part === "" && $counter !== 0)
                    throw new PatternMatchException("The \$pattern must be in a valid URL format.");

                if (strpos($part, $token) !== 0)
                {
                    $segments[] = $part;
                    $counter++;
                    continue;
                }

                $part = substr($part, 1, strlen($part) - 1);

                if(!array_key_exists($part, $params))
                    throw new PatternMatchException("Parameter '$part' was not found in \$params!");

                $segments[] = $params[$part];

                $counter++;
            }

            return implode("/", $segments);
        }
        else
        {
            return $pattern;
        }


    }


}