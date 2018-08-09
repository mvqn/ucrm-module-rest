<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;



class TaxTest extends \PHPUnit\Framework\TestCase
{
    /** @var string Location of the .env file for development. */
    protected const DOTENV_PATH = __DIR__."/../../../../";



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
        $this->markTestSkipped("No taxes are entered in UCRM!");

        $taxes = Tax::get();
        $this->assertNotEmpty($taxes);

        echo ">>> Tax::get()\n";

        foreach($taxes as $tax)
            echo $tax."\n";

        echo "\n";
    }

    public function testGetCountryById()
    {
        $this->markTestSkipped("No taxes are entered in UCRM!");

        $tax = Tax::getById(1);
        $this->assertNotNull($tax);

        echo ">>> Tax::getById(1)\n";
        echo $tax."\n";
        echo "\n";

    }

    /*
    public function testGetById()
    {
        $client = Client::getById(1);
        $this->assertInstanceOf(Client::class, $client);

        echo $client."\n";
    }
    */




}
