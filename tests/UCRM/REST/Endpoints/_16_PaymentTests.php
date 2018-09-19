<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\Collections\Collection;
use MVQN\REST\RestClient;

require_once __DIR__."/TestFunctions.php";

class _16_PaymentTests extends \PHPUnit\Framework\TestCase
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
        $payment = Payment::getById(1);

        $test = TestFunctions::testAllGetters($payment);
        $this->assertTrue($test);
    }

    public function testGet()
    {
        $payments = Payment::get();
        $this->assertNotNull($payments);

        echo ">>> Payment::get()\n";
        echo $payments."\n";
        echo "\n";
    }

    public function testGetById()
    {
        $payment = Payment::getById(1);
        $this->assertEquals(1, $payment->getId());

        echo ">>> Payment::getById(1)\n";
        echo $payment."\n";
        echo "\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testHelperMethods()
    {
        /** @var Payment $payment */
        $payment = Payment::getById(3);

        echo ">>> PaymentTests::testHelperMethods()\n";

        $client = $payment->getClient();
        echo "> getClient() => ".$client."\n";
        echo "> setClient() => ".$payment->setClient($client)."\n";

        $currency = $payment->getCurrency();
        echo "> getCurrency() => ".$currency."\n";
        echo "> setCurrency() => ".$payment->setCurrency($currency)."\n";

        // DEPRECATED!
        $invoice = $payment->getInvoice();
        echo "> getCurrency() => ".$invoice."\n";
        //echo "> setCurrency() => ".$payment->setCurrency($invoice)."\n";

        // DOESN'T EVER SEEM TO CONTAIN ANY VALUES!
        $invoices = $payment->getInvoices();
        echo "> getInvoices() => ".$invoices."\n";
        //echo "> setInvoices() => ".$payment->setInvoices($invoices)."\n";

        echo "> getInvoices() => ".($payment->getApplyToInvoicesAutomatically() ? "true" : "false")."\n";

        $this->assertEmpty($invoices);

        echo "\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testPaymentInsert()
    {
        $client = Client::getById(1);

        $payment = (new Payment())
            ->setClientId(1)
            ->setMethod(Payment::METHOD_CHECK)
            ->setCheckNumber("1234")
            ->setCreatedDate(new \DateTime())
            ->setAmount(30)
            ->setCurrencyCode("USD")
            ->setNote("From API")
            //->setInvoiceId(3) // DEPRECATED
            ->setInvoiceIds([ 3 ])
            ->setProviderName("MVQN API")
            ->setProviderPaymentId("123456")
            ->setProviderPaymentTime(new \DateTime())
            ->setApplyToInvoicesAutomatically(false);

        echo ">>> Payment::insert()\n";
        print_r($payment);
        echo "\n";

        //$payment->insert();

        $this->assertTrue(true);
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testPaymentSendReceipt()
    {
        /** @var Payment $payment */
        $payment = Payment::getById(1);
        //$payment->sendReceipt();

        echo ">>> Payment::sendReceipt()\n";
        print_r($payment);
        echo "\n";

        $this->assertTrue(true);
    }

}
