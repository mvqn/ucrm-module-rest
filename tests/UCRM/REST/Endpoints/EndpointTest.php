<?php
declare(strict_types=1);

namespace UCRM\REST;



use UCRM\REST\Endpoints\Endpoint;
use UCRM\REST\Endpoints\EndpointOptions;

class EndpointTest extends \PHPUnit\Framework\TestCase
{
    /** @var string Location of the .env file for development. */
    protected const DOTENV_PATH = __DIR__ . "/../../../../";



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



    /*
    public function testGet()
    {
        $this->markTestSkipped("Implement later!");
    }
    */



    public function testScrape()
    {
        $base_url = "https://ucrmbeta.docs.apiary.io/#reference";

        $options = [
            "class"                     =>  "Client",
            "base"                      =>  "/clients",
            "endpoints"                 =>  [
                "GET"                   =>  [
                    "Client"            =>  "/clientsid/get",
                    "Client[]"          =>  "/clientsuseridentcustomattributekeycustomattributevalueorderdirection/get",

                ],
                "POST"                  =>  [
                    "Client"            =>  "/clients/post",
                ],
                "PATCH"                 =>  [
                    "Client"            =>  "/clientsid/patch",
                    "SendInvitation"    =>  "/clientsidsend-invitation/patch",
                ]
            ]
        ];

        /** @var EndpointOptions $options */
        $options = new EndpointOptions();

        $options->addEndpoint("Version", "/general")
            ->addEndpointNode("Version", "get", "/version/get");

        $options->addEndpoint("Country", "/general")
            ->addEndpointNode("Country", "get", "/countries/get")
            ->addEndpointNode("Country", "getById", "/countriesid/get");

        $options->addEndpoint("Currency", "/general")
            ->addEndpointNode("Currency", "get", "/currencies/get")
            ->addEndpointNode("Currency", "getById", "/currenciesid/get");


        $client = Endpoint::scrape($base_url, $options);






    }





}
