<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Endpoints\Lookups\InvoiceItem;
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


    public function testGetByClientId()
    {
        $invoices = Invoice::getByClientId(1);
        $this->assertNotNull($invoices);

        echo ">>> Invoice::getByClientId(1)\n";
        echo $invoices."\n";
        echo "\n";
    }

    public function testGetByStatuses()
    {
        $invoices = Invoice::getByStatuses(Invoice::STATUS_UNPAID);
        $this->assertNotNull($invoices);

        echo ">>> Invoice::getByStatuses(Invoice::STATUS_UNPAID)\n";
        echo count($invoices)." > $invoices\n";
        echo "\n";
    }

    public function testGetByNumber()
    {
        $invoice = Invoice::getByNumber("000003");
        $this->assertNotNull($invoice);

        echo ">>> Invoice::getByNumber('000003')\n";
        echo $invoice."\n";
        echo "\n";
    }

    public function testGetByOverdue()
    {
        $invoices = Invoice::getByOverdue(false);
        $this->assertNotNull($invoices);

        echo ">>> Invoice::getByOverdue(1)\n";
        echo count($invoices)." > $invoices\n";
        echo "\n";
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
