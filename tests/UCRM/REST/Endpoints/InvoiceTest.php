<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;



class InvoiceTest extends \PHPUnit\Framework\TestCase
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
        $invoices = Invoice::get();
        $this->assertNotEmpty($invoices);

        foreach($invoices as $invoice)
            echo $invoice."\n";
    }


    public function testGetById()
    {
        $invoice = Invoice::getById(1);
        $this->assertInstanceOf(Invoice::class, $invoice);

        echo $invoice."\n";
    }





}
