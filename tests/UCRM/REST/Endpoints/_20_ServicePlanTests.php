<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\Collections\Collection;
use UCRM\REST\Endpoints\Collections\ServicePlanCollection;
use UCRM\REST\RestClient;

require_once __DIR__."/TestFunctions.php";

class _20_ServicePlanTests extends \PHPUnit\Framework\TestCase
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
        $servicePlan = ServicePlan::getById(1);

        $test = TestFunctions::testAllGetters($servicePlan);
        $this->assertTrue($test);
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testGet()
    {
        $servicePlans = ServicePlan::get();
        $this->assertNotNull($servicePlans);

        echo ">>> ServicePlan::get()\n";
        echo $servicePlans."\n";
        echo "\n";
    }

    public function testGetById()
    {
        /** @var ServicePlan $servicePlan */
        $servicePlan = ServicePlan::getById(1);
        $this->assertEquals(1, $servicePlan->getId());

        $test = $servicePlan->getOrganization();
        echo $test."\n";
        $servicePlan->setOrganization($test)->setInvoiceLabel("Testing");
        echo $servicePlan."\n";

        $newServicePlan = new ServicePlan();
        $newServicePlan->setOrganizationByDefault();
        echo $newServicePlan."\n";

        echo ">>> ServicePlan::getById(1)\n";
        echo $servicePlan."\n";
        echo "\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testGetByName()
    {
        /** @var Organization $organization */
        $organization = Organization::getByName("Mason Valley Quicknet");
        $this->assertEquals("Mason Valley Quicknet", $organization->getName());

        echo ">>> Organization::getByName('Mason Valley Quickney')\n";
        echo $organization."\n";
        echo "\n";
    }

    public function testGetDefault()
    {
        /** @var Organization $organization */
        $organization = Organization::getByDefault();
        $this->assertEquals("Mason Valley Quicknet", $organization->getName());

        echo ">>> Organization::getDefault()\n";
        echo $organization."\n";
        echo "\n";
    }

}
