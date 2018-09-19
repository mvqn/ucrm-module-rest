<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Lookups\InvoiceItem;
use MVQN\REST\RestClient;

require_once __DIR__."/TestFunctions.php";

class _13_QuoteTests extends \PHPUnit\Framework\TestCase
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
        $quote = Quote::getById(1);

        $test = TestFunctions::testAllGetters($quote);
        $this->assertTrue($test);
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testGet()
    {
        $quotes = Quote::get();
        $this->assertNotEmpty($quotes);

        foreach($quotes as $quote)
            echo $quote."\n";
    }


    public function testGetById()
    {
        $quote = Quote::getById(1);
        $this->assertInstanceOf(Quote::class, $quote);

        echo $quote."\n";
    }



    public function testAddInvoiceItem()
    {
        $this->markTestSkipped("Each addition duplicates all other line items as well; waiting on info from UBNT!");

        /** @var Invoice $invoice */
        $invoice = Invoice::getById(4);
        $this->assertInstanceOf(Invoice::class, $invoice);

        $invoice->addInvoiceItem(
            (new InvoiceItem())
                ->setId(4)
                ->setLabel("Monthly Internet Service (0.8Mbps) 1 May 2018 - 30 May 2018")
                ->setPrice(10)
                ->setQuantity(1)
        );

        $inserted = $invoice->update();

        echo $inserted."\n";
    }


    public function testDelInvoiceItem()
    {
        $this->markTestSkipped("Each addition duplicates all other line items as well; waiting on info from UBNT!");

        // TODO: May have to do this through the DB???

        /** @var Invoice $invoice */
        $invoice = Invoice::getById(4);
        $this->assertInstanceOf(Invoice::class, $invoice);

        $invoice->delInvoiceItem(0);
        $invoice->delInvoiceItem(1);
        $invoice->delInvoiceItem(2);

        $test = $invoice->toJSON("patch", true, JSON_UNESCAPED_SLASHES);

        $test = str_replace("\"items\":[null,null,null,{\"label\":\"Test Item\",\"price\":1,\"quantity\":1},{\"label\":\"Test Item\",\"price\":1,\"quantity\":1},{\"label\":\"Monthly Internet Service (0.8Mbps) 1 May 2018 - 30 May 2018\",\"price\":10,\"quantity\":1}]", "\"items\":null", $test);

        echo $test."\n";

        $response = RestClient::patchJSON("/invoices/4", $test);

        print_r($response);


        //$invoice->update();

        //echo $invoice."\n";

    }


}
