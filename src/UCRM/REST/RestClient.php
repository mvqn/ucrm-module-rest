<?php
declare(strict_types=1);

namespace UCRM\REST;



/**
 * Class RestClient
 *
 * @package UCRM\REST
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 */
final class RestClient
{
    /** @var string  */
    private static $_baseUrl = "";

    /** @var string  */
    private static $_ucrmKey = "";



    /**
     * Gets or sets the base URL to be used with all REST calls.
     *
     * @param string $url The base URL for which to prefix all REST calls.
     * @return string Returns the base URL that is currently set.
     * @throws RestClientException Throws an exception if the base URL is not set and none has been provided.
     */
    public static function baseUrl(string $url = ""): string
    {
        // IF no URL has been specified...
        if($url === "" || $url === null)
        {
            // AND the current URL is not set...
            if (self::$_baseUrl === "")
                // ... Throw an exception!
                throw new RestClientException(
                    "'baseUrl' must be set by RestClient::baseUrl() before calling any RestClient methods!");
        }
        else
        {
            // OTHERWISE set the URL to that which was specified here.
            self::$_baseUrl = $url;
        }

        // Finally, return the URL, which should NEVER be empty at this point!
        return self::$_baseUrl;
    }

    /**
     * Gets or sets the App Key to be used with all REST calls.
     *
     * @param string $key The App Key for which to set in the header of all REST calls.
     * @return string Returns the App Key that is currently set.
     * @throws RestClientException Throws an exception if the App Key is not set and none has been provided.
     */
    public static function ucrmKey(string $key = ""): string
    {
        // IF no Key has been specified...
        if($key === "" || $key === null)
        {
            // AND the current Key is not set...
            if (self::$_ucrmKey === "")
                // ... Throw an exception!
                throw new RestClientException(
                    "'ucrmKey' must be set by RestClient::ucrmKey() before calling any RestClient methods!");
        }
        else
        {
            // OTHERWISE set the Key to that which was specified here.
            self::$_ucrmKey = $key;
        }

        // Finally, return the Key, which should NEVER be empty at this point!
        return self::$_ucrmKey;
    }



    /**
     * Creates a cURL session with the necessary options, headers and endpoint to communicate with the UCRM Server.
     *
     * @param string $endpoint The endpoint at which to make the request.
     * @return resource Returns a cURL session.
     */
    private static function curl(string $endpoint)
    {
        // Get the base URL and App Key.
        $baseUrl = self::$_baseUrl;
        $ucrmKey = self::$_ucrmKey;

        // Create a cURL session.
        $curl = curl_init();

        // Set the options necessary for communicating with the UCRM Server.
        curl_setopt($curl, CURLOPT_URL, $baseUrl.$endpoint);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        // TODO: Determine if we EVER need to use HTTPS and how to handle it correctly here!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); // DEFAULT
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1); // DEFAULT

        // Set the necessary HTTP HEADERS.
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "X-Auth-App-Key: $ucrmKey"
        ]);

        return $curl;
    }



    /**
     * Sends a HTTP GET Request to the specified endpoint of the base URL.
     *
     * @param string $endpoint The endpoint at which to make the request.
     * @return array Returns an associative array of the JSON result.
     * @throws RestClientException Throws an exception if there were errors during the REST request/response phase.
     */
    public static function get(string $endpoint): array
    {
        // Create the cURL session.
        $curl = self::curl($endpoint);

        // Execute the request and capture the response.
        $response = curl_exec($curl);

        // Check to see if there were any errors...
        if(!$response)
            throw new RestClientException("The REST request failed with the following error(s): ".curl_error($curl));

        // Close the cURL session.
        curl_close($curl);

        // Finally, return the resulting associative array!
        return json_decode($response, true);
    }



    /**
     * Sends multiple HTTP GET Request to the specified endpoints of the base URL.
     *
     * @param array $endpoints An array of endpoints to use for the multiple requests.
     * @return array Returns an associative array of the JSON results.
     * @throws RestClientException Throws an exception if there were errors during the REST request/response phase.
     */
    public static function getMany(array $endpoints): array
    {
        // Create a cURL multi-session handler and an array to store each instance of the cURL sessions.
        $curl_handler = curl_multi_init();
        $curls = [];

        // Loop through each provided endpoint...
        for($i = 0; $i < count($endpoints); $i++)
        {
            // Create the cURL session.
            $curl = self::curl($endpoints[$i]);

            // Add the cURL session to the multi-session handler and store it in the array of sessions.
            curl_multi_add_handle($curl_handler, $curl);
            $curls[] = $curl;
        }

        $running = null;
        // Loop through and execute all of the cURL sessions in the multi-session handler...
        do curl_multi_exec($curl_handler, $running); while ($running);

        $responses = [];
        // Loop through each of the cURL sessions...
        for($i = 0; $i < count($curls); $i++)
        {
            // Get each session response and convert it to an associative array.
            $response = curl_multi_getcontent($curls[$i]);

            // Check to see if there were any errors...
            if(!$response)
                throw new RestClientException(
                    "The REST request failed with the following error(s): ".curl_error($curls[$i]));

            //  Append the successful response to the array of responses.
            $responses[] = json_decode($response, true);

            // Then remove the cURL session from the multi-session handler.
            curl_multi_remove_handle($curl_handler, $curls[$i]);
        }

        // Close the cURL multi-session handler.
        curl_multi_close($curl_handler);

        // Finally, return the
        return $responses;
    }



    /**
     * Sends a HTTP POST Requests to the specified endpoint of the base URL.
     *
     * @param string $endpoint The endpoint at which to make the request.
     * @param array $data An associative array of data to provide to the endpoint and converted to JSON.
     * @return array Returns an associative array of the JSON result.
     * @throws RestClientException Throws an exception if there were errors during the REST request/response phase.
     */
    public static function post(string $endpoint, array $data): array
    {
        // Create the cURL session.
        $curl = self::curl($endpoint);

        // Set any additional options.
        curl_setopt($curl, CURLOPT_POST, true);

        // Set the data to be provided to the endpoint.
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_SLASHES));

        // Execute the request and capture the response.
        $response = curl_exec($curl);

        // Check to see if there were any errors...
        if(!$response)
            throw new RestClientException("The REST request failed with the following error(s): ".curl_error($curl));

        // Close the cURL session.
        curl_close($curl);

        // Finally, return the resulting associative array!
        return json_decode($response, true);
    }



    /**
     * Sends multiple HTTP POST Requests to the specified endpoints of the base URL.
     *
     * @param array $endpoints An array of endpoints to use for the multiple requests.
     * @param array[] $data An array of associative arrays of data to provide to the endpoints and converted to JSON.
     * @return array Returns an associative array of the JSON results.
     * @throws RestClientException Throws an exception if there were errors during the REST request/response phase.
     */
    public static function postMany(array $endpoints, array $data): array
    {
        if(count($endpoints) !== count($data))
            throw new RestClientException(
                "Each endpoint in a RestClient::postMany() call must have an accompanying data element.");

        // Create a cURL multi-session handler and an array to store each instance of the cURL sessions.
        $curl_handler = curl_multi_init();
        $curls = [];

        // Loop through each provided endpoint...
        for($i = 0; $i < count($endpoints); $i++)
        {
            // Create the cURL session.
            $curl = self::curl($endpoints[$i]);

            // Set any additional options.
            curl_setopt($curl, CURLOPT_POST, true);

            // Set the data to be provided to the endpoint.
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data[$i], JSON_UNESCAPED_SLASHES));

            // Add the cURL session to the multi-session handler and store it in the array of sessions.
            curl_multi_add_handle($curl_handler, $curl);
            $curls[] = $curl;
        }

        $running = null;
        // Loop through and execute all of the cURL sessions in the multi-session handler...
        do curl_multi_exec($curl_handler, $running); while ($running);

        $responses = [];
        // Loop through each of the cURL sessions...
        for($i = 0; $i < count($curls); $i++)
        {
            // Get each session response and convert it to an associative array.
            $response = curl_multi_getcontent($curls[$i]);

            // Check to see if there were any errors...
            if(!$response)
                throw new RestClientException(
                    "The REST request failed with the following error(s): ".curl_error($curls[$i]));

            //  Append the successful response to the array of responses.
            $responses[] = json_decode($response, true);

            // Then remove the cURL session from the multi-session handler.
            curl_multi_remove_handle($curl_handler, $curls[$i]);
        }

        // Close the cURL multi-session handler.
        curl_multi_close($curl_handler);

        // Finally, return the
        return $responses;
    }




    /**
     * Sends a HTTP PATCH Request to the specified endpoint of the base URL.
     *
     * @param string $endpoint The endpoint at which to make the request.
     * @param array $data An associative array of data to provide to the endpoint and converted to JSON.
     * @return array Returns an associative array of the JSON result.
     * @throws RestClientException Throws an exception if there were errors during the REST request/response phase.
     */
    public static function patch(string $endpoint, array $data): array
    {
        // Create the cURL session.
        $curl = self::curl($endpoint);

        // Set any additional options.
        //curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");

        // Set the data to be provided to the endpoint.
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_SLASHES));

        // Execute the request and capture the response.
        $response = curl_exec($curl);

        // Check to see if there were any errors...
        if(!$response)
            throw new RestClientException("The REST request failed with the following error(s): ".curl_error($curl));

        // Close the cURL session.
        curl_close($curl);

        // Finally, return the resulting associative array!
        return json_decode($response, true);
    }


}