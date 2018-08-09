<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\Annotations\AnnotationReader;
use UCRM\REST\RestClient;



class AnnotationReaderTests extends \PHPUnit\Framework\TestCase
{
    /** @var string Location of the .env file for development. */
    protected const DOTENV_PATH = __DIR__."/../../../";



    /**
     * Sets up the RestClient for testing.
     *
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    protected function setUp()
    {
        // Load ENV variables from a file during development.
        if(file_exists(self::DOTENV_PATH))
        {
            $dotenv = new \Dotenv\Dotenv(self::DOTENV_PATH);
            $dotenv->load();
        }

        RestClient::baseUrl(getenv("REST_URL"));
        RestClient::ucrmKey(getenv("REST_KEY"));
    }



    public function testParseClass()
    {
        $annotations = new AnnotationReader(Client::class);
        //$parameters = $annotations->getParameters();
        //print_r($parameters);

        $endpoints = $annotations->getParameter("endpoints");
        print_r($endpoints);

        $test = $annotations->getParameter("endpoints/getById");
        print_r($test);
    }




}
