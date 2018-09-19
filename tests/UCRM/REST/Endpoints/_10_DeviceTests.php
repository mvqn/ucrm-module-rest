<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\RestClient;

require_once __DIR__."/TestFunctions.php";

class _10_DeviceTests extends \PHPUnit\Framework\TestCase
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
        $device = Device::getById(1);

        $test = TestFunctions::testAllGetters($device);
        $this->assertTrue($test);
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testGet()
    {
        $devices = Device::get();
        $this->assertNotNull($devices);

        echo ">>> Device::get()\n";
        echo $devices."\n";
        echo "\n";
    }

    public function testGetById()
    {
        /** @var Device $device */
        $device = Device::getById(1);
        $this->assertEquals(1, $device->getId());

        echo ">>> Device::getById(1)\n";
        echo $device."\n";
        echo "\n";
    }

}
