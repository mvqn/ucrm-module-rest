<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\RestClient;

use UCRM\REST\Endpoints\Lookups\ClientContact;

require_once __DIR__."/TestFunctions.php";

class _05_ServiceTests extends \PHPUnit\Framework\TestCase
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
        $services = Service::getById(1);

        $test = TestFunctions::testAllGetters($services);
        $this->assertTrue($test);
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testGet()
    {
        $services = Service::get();
        $this->assertNotEmpty($services);

        echo ">>> Service::get()\n";

        foreach($services as $service)
            echo $service."\n";

        echo "\n";
    }

    public function testGetById()
    {
        /** @var Service $service */
        $service = Service::getById(1);
        $this->assertInstanceOf(Service::class, $service);

        echo ">>> Service::getById(1)\n";
        echo $service."\n";
        echo "\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testInsert()
    {
        $service = new Service();
        $service
            // MUTS BE SET!!!
            ->setClientId(1)

            // --- GENERAL ---
            // * Service plan
            ->setServicePlanId(1)
            // * Service period
            ->setServicePlanPeriodId(1)
            // * Name (Blank for Default)
            //->setName("")
            // * Note
            ->setNote("Created by API.")
            // * Individual price (Do not set for default ServicePlan price)
            //->setPrice()
            // * Active from
            ->setActiveFrom(new \DateTime("01/01/2019"))
            // * Block service IPs until the service is acivated - TODO: Not seeing this option in API!
            // * Active to (Do not set, if indefinite service is desired)
            //->setActiveTo(new \DateTime("12/31/2019"))

            // --- INVOICE ---
            // * Invoicing from
            ->setInvoicingStart(new \DateTime("01/01/2019"))
            // * Invoicing type
            ->setInvoicingPeriodType(Service::INVOICING_PERIOD_TYPE_FORWARD)
            // * Period start day
            ->setInvoicingPeriodStartDay(1)
            // * Create invoice X days in advance
            ->setNextInvoicingDayAdjustment(5)
            // * Invoice separately - TODO: Check to see how these two affect the settings!
            ->setInvoicingProratedSeparately(true)
            ->setInvoicingSeparately(true)
            // * Approve and send invoice automatically
            ->setSendEmailsAutomatically(false)
            // * Use credit automatically
            ->setUseCreditAutomatically(false)
            // * Item label (Do not set for default ServicePlan label)
            //->setInvoiceLabel("Overridden Label")

            // --- SERVICE LOCATION ---
            //->setStreet1("")
            //->setStreet2("")
            //->setCity("")
            //->setCountry(249)
            //->setState(28)
            //->setZipCode("12345")
            //->getAddressGpsLat()
            //->getAddressGpsLat()

            // --- CONTRACT ---
            // * Contract ID
            //->setContractId()
            // * Type (Required, default is "Open end contract")
            ->setContractLengthType(Service::CONTRACT_LENGTH_TYPE_OPEN_ENDED)
            // * End date (ONLY available when "Close-end contract" is selected)
            //->setContractEndDate()
            // * Setup fee - Missing from API?
            // * Early termination fee - Missing from API?
            // * Minimum contract length (in months)
            //->setMinimumContractLengthMonths()

            // --- SURCHARGES ---


            // --- DISCOUNT SETTINGS ---
            // * Discount type (Required, default is "No discount")
            ->setDiscountType(Service::DISCOUNT_TYPE_NONE)
            // * Discount value
            ->setDiscountValue(0)
            // * Invoice Label
            //->setDiscountInvoiceLabel("")
            // * Discount from
            ->setDiscountFrom(new \DateTime("01/01/2019"));
            // * Discount to (Do not set, if indefinite discount is desired)
            //->setDiscountTo()

            // --- TAXES ---
            // * Tax 1
            //->setTax1Id()
            // * Tax 2
            //->setTax2Id()
            // * Tax 3
            //->setTax3Id()

        print_r($service);

        $this->markTestSkipped("Skip so we do not keep creating Clients in the UCRM!");

        $inserted = $service->create();
        print_r($inserted);
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testUpdate()
    {
        /** @var Client $client */
        $client = Client::getById(1);

        // Clear all non-required properties.
        $client->minimal("patch");

        // Update any setting here...
        $name = "Worthen".rand(0, 9);
        $client->setLastName($name);

        // Use the built-in reset commands to change back to system defaults.
        //$client->setSendInvoiceByPost(true);
        $client->resetSendInvoiceByPost();

        // Validate the information...
        if($client->validate("patch", $missing))
        {
            /** @var Client $updated */
            $updated = $client->update();
            $this->assertEquals($name ,$updated->getLastName());
            echo $updated."\n";
        }
        else
        {
            echo ">>> MISSING: ";
            print_r($missing);
            echo "\n";
        }
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testSendInvitation()
    {
        /** @var Client $client */
        $client = Client::getById(1);
        //$client->sendInvitationEmail();
        $this->assertNotNull($client);

        echo ">>> Client::getById(1)->sendInvitationEmail()\n";
        echo $client."\n";
        echo "\n";
    }

}
