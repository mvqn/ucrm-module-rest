<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;

require_once __DIR__."/TestFunctions.php";

class _12_InvoiceTests extends \PHPUnit\Framework\TestCase
{
    // =================================================================================================================
    // INITIALIZATION
    // -----------------------------------------------------------------------------------------------------------------

    /** @var string Location of the .env file for development. */
    protected const DOTENV_PATH = __DIR__."/../../../../";

    // -----------------------------------------------------------------------------------------------------------------

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

    // =================================================================================================================
    // TESTS
    // -----------------------------------------------------------------------------------------------------------------

    public function testAllGetters()
    {
        $invoice = Invoice::getById(1);

        $test = TestFunctions::testAllGetters($invoice);
        $this->assertTrue($test);
    }

    // -----------------------------------------------------------------------------------------------------------------

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
