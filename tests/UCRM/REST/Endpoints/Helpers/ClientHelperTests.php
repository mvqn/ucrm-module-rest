<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;



class ClientHelperTests extends \PHPUnit\Framework\TestCase
{
    /** @var string Location of the .env file for development. */
    protected const DOTENV_PATH = __DIR__."/../../../../../";



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



    public function testGet()
    {
        /** @var Client $client */
        //$client = Client::getById(1);
        $client = new Client();

        //print_r($client->getOrganization());

        //die();



        $client->setCountryByName("United States");
        $client->setStateByCode("NV");

        print_r($client);

        die();




        $organization = $client->getOrganization();
        echo $organization->getName()."\n";

        $client->setOrganization($organization);

        print_r($client);

    }


    public function testGetById()
    {

    }






}
