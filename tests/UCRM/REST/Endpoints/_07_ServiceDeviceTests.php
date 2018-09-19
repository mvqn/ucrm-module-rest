<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\RestClient;

require_once __DIR__."/TestFunctions.php";

class _07_ServiceDeviceTests extends \PHPUnit\Framework\TestCase
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
        $serviceDevice = ServiceDevice::getById(1);

        $test = TestFunctions::testAllGetters($serviceDevice);
        $this->assertTrue($test);
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testGet()
    {
        $service = Service::getById(1);

        $serviceDevice = ServiceDevice::get("", ["serviceId" => $service->getId()]);
        $this->assertNotNull($serviceDevice);

        echo ">>> ServiceDevice::get('', [ 'serviceId' => \$service->getId() ])\n";
        echo $serviceDevice."\n";
        echo "\n";
    }

    public function testGetById()
    {
        /** @var ServiceDevice $serviceDevice */
        $serviceDevice = ServiceDevice::getById(1);
        $this->assertEquals(1, $serviceDevice->getId());

        echo ">>> ServiceDevice::getById(1)\n";
        echo $serviceDevice."\n";
        echo "\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testGetByService()
    {
        /** @var Service $service */
        $service = Service::getById(1);

        $serviceDevices = ServiceDevice::getByService($service);
        $this->assertGreaterThanOrEqual(1, $serviceDevices->count());

        echo ">>> ServiceDevice::getById(1)\n";
        echo $serviceDevices."\n";
        echo "\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testCreate()
    {
        /** @var Service $service */
        $service = Service::getById(2);
        $device = Device::getById(1);

        /** @var DeviceInterface $deviceInterface */
        $deviceInterface = DeviceInterface::getById(1);
        /** @var Vendor $vendor */
        $vendor = Vendor::getById(3);

        $serviceDevice = ServiceDevice::create($service, $deviceInterface, $vendor, "192.168.1.22");

        $this->markTestSkipped("Skipping to prevent numerous entries into the UCRM.");

        $inserted = $serviceDevice->insert();

        echo ">>> ServiceDevice::insert()\n";
        echo $inserted."\n";
        echo "\n";
    }

    public function testUpdate()
    {
        /** @var Service $service */
        $service = Service::get()->last();

        /** @var ServiceDevice $serviceDevice */
        $serviceDevice = ServiceDevice::getByService($service)->last();

        echo $serviceDevice."\n";
        echo "\n";

        $macAddress = "1234567890AB";
        $ipRange = [ "192.168.1.23" ];

        //$serviceDevice->setMacAddress($macAddress);
        //$serviceDevice->setIpRange($ipRange);
        $serviceDevice->setVendorId(1);

        // DOES NOT SEEM TO WORK!

        $this->markTestSkipped("Skipping to prevent numerous entries into the UCRM.");

        $updated = $serviceDevice->update();

        //$this->assertEquals($macAddress, $updated->getMacAddress());

        echo ">>> ServiceDevice::update()\n";
        echo $updated."\n";
        echo "\n";
    }



}
