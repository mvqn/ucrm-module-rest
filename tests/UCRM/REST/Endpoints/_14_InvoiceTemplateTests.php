<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\RestClient;

require_once __DIR__."/TestFunctions.php";

class _14_InvoiceTemplateTests extends \PHPUnit\Framework\TestCase
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

        RestClient::setBaseUrl(getenv("REST_URL"));
        RestClient::setHeaders([
            "Content-Type: application/json",
            "X-Auth-App-Key: ".getenv("REST_KEY")
        ]);
    }

    // =================================================================================================================
    // TESTS
    // -----------------------------------------------------------------------------------------------------------------

    public function testAllGetters()
    {
        $invoiceTemplate = InvoiceTemplate::getById(1);

        $test = TestFunctions::testAllGetters($invoiceTemplate);
        $this->assertTrue($test);
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testGet()
    {
        $invoiceTemplates = InvoiceTemplate::get();
        $this->assertNotEmpty($invoiceTemplates);

        foreach($invoiceTemplates as $invoiceTemplate)
            echo $invoiceTemplate."\n";
    }


    public function testGetById()
    {
        $invoiceTemplate = InvoiceTemplate::getById(1);
        $this->assertInstanceOf(InvoiceTemplate::class, $invoiceTemplate);

        echo $invoiceTemplate."\n";
    }





}
