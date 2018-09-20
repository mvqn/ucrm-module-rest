<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\REST\RestClient;

require_once __DIR__."/TestFunctions.php";

class _22_TaxTests extends \PHPUnit\Framework\TestCase
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
    // GETTERS & SETTERS
    // -----------------------------------------------------------------------------------------------------------------

    public function testAllGetters()
    {
        /** @var Tax $first */
        $first = Tax::get()->first();

        $test = TestFunctions::testAllGetters($first);
        $this->assertTrue($test);
    }



    // =================================================================================================================
    // CREATE
    // -----------------------------------------------------------------------------------------------------------------

    public function testCreate()
    {
        $name = "Tax".rand(1, 9);

        $created = Tax::create($name, 5);
        $this->assertEquals($name, $created->getName());

        echo $created."\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testInsert()
    {
        $name = "Tax".rand(1, 9);

        $tax = (new Tax())
            ->setName($name)
            ->setRate(20)
            ->setAgencyName("Big Brother")
            ->setSelected(true); // Not supported by Endpoint.

        if($tax->validate("post", $missing, $ignored))
        {
            echo "MISSING: ";
            print_r($missing);
            echo "\n";

            echo "IGNORED: ";
            print_r($ignored);
            echo "\n";
        }

        /** @var Tax $inserted */
        $inserted = $tax->insert();
        $this->assertEquals($name, $inserted->getName());

        echo $inserted."\n";
    }

    // =================================================================================================================
    // READ
    // -----------------------------------------------------------------------------------------------------------------

    public function testGet()
    {
        $taxes = Tax::get();
        $this->assertNotNull($taxes);

        echo ">>> Tax::get()\n";
        echo $taxes."\n";
        echo "\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testGetById()
    {
        /** @var Tax $first */
        $first = Tax::get()->first();
        $id = $first->getId();

        /** @var Tax $tax */
        $tax = Tax::getById($id);
        $this->assertEquals($id, $tax->getId());

        echo ">>> Tax::getById($id)\n";
        echo $tax."\n";
        echo "\n";
    }

    // =================================================================================================================
    // UPDATE
    // -----------------------------------------------------------------------------------------------------------------

    // NO PATCH ENDPOINT

    // =================================================================================================================
    // DELETE
    // -----------------------------------------------------------------------------------------------------------------

    // NO DELETE ENDPOINT



    // =================================================================================================================
    // OTHER TESTS
    // -----------------------------------------------------------------------------------------------------------------

    // ...
}
