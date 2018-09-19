<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\Collections\ServicePlanCollection;
use UCRM\REST\Endpoints\Collections\SurchargeCollection;
use MVQN\REST\RestClient;

require_once __DIR__."/TestFunctions.php";

class _06_ServiceSurchargeTests extends \PHPUnit\Framework\TestCase
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
        $serviceSurcharge = ServiceSurcharge::getById(1);

        $test = TestFunctions::testAllGetters($serviceSurcharge);
        $this->assertTrue($test);
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testGet()
    {
        $service = Service::getById(2);

        $serviceSurcharge = ServiceSurcharge::get("", ["serviceId" => $service->getId()]);
        $this->assertNotNull($serviceSurcharge);

        echo ">>> ServiceSurcharge::get('', [ 'serviceId' => \$service->getId() ])\n";
        echo $serviceSurcharge."\n";
        echo "\n";
    }

    public function testGetById()
    {
        /** @var ServiceSurcharge $serviceSurcharge */
        $serviceSurcharge = ServiceSurcharge::getById(1);
        $this->assertEquals(1, $serviceSurcharge->getId());

        echo ">>> ServiceSurcharge::getById(1)\n";
        echo $serviceSurcharge."\n";
        echo "\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testGetByService()
    {
        /** @var Service $service */
        $service = Service::getById(2);

        $serviceSurcharges = ServiceSurcharge::getByService($service);
        $this->assertGreaterThanOrEqual(1, $serviceSurcharges->count());

        echo ">>> ServiceSurcharge::getById(1)\n";
        echo $serviceSurcharges."\n";
        echo "\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testCreate()
    {
        /** @var Service $service */
        $service = Service::getById(2);

        /** @var Surcharge $surcharge */
        $surcharge = Surcharge::getByName("Test Surcharge")->first();

        $serviceSurcharge = new ServiceSurcharge();
        $serviceSurcharge
            ->setServiceId($service->getId())
            ->setSurchargeId($surcharge->getId())
            ->setInvoiceLabel("Testing Srucharge from API")
            //->setPrice() // DEFAULT
            ->setTaxable(false);

        $this->markTestSkipped("Skipping to prevent numerous entries into the UCRM.");

        $inserted = $serviceSurcharge->create();

        echo ">>> ServiceSurcharge::create()\n";
        echo $inserted."\n";
        echo "\n";
    }


    public function testUpdate()
    {
        /** @var Service $service */
        $service = Service::getById(2);

        /** @var ServiceSurcharge $serviceSurcharge */
        $serviceSurcharge = ServiceSurcharge::getByService($service)->last();

        echo $serviceSurcharge."\n";
        echo "\n";

        $price = rand(1, 10);

        $serviceSurcharge
            //->setSurchargeId($surcharge->getId())
            //->setInvoiceLabel("Testing Srucharge from API")
            ->setPrice($price);

        //$this->markTestSkipped("Skipping to prevent numerous entries into the UCRM.");

        $updated = $serviceSurcharge->update();

        $this->assertEquals($price, $updated->getPrice());

        echo ">>> ServiceSurcharge::update()\n";
        echo $updated."\n";
        echo "\n";
    }



}
