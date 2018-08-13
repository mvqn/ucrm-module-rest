<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\Collections\Collection;
use UCRM\REST\RestClient;

require_once __DIR__."/TestFunctions.php";

class _04_ClientLogTests extends \PHPUnit\Framework\TestCase
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
        $clientLog = ClientLog::getById(1);

        $test = TestFunctions::testAllGetters($clientLog);
        $this->assertTrue($test);
    }

    public function testGet()
    {
        $clientLogs = ClientLog::get();
        $this->assertNotNull($clientLogs);

        echo ">>> ClientLog::get()\n";
        echo $clientLogs."\n";
        echo "\n";
    }

    public function testGetById()
    {
        $clientLog = ClientLog::getById(1);
        $this->assertEquals(1, $clientLog->getId());

        echo ">>> ClientLog::getById(1)\n";
        echo $clientLog."\n";
        echo "\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testHelperMethods()
    {
        /** @var ClientLog $clientLog */
        $clientLog = ClientLog::getById(1);

        echo ">>> ClientLogTests::testHelperMethods()\n";

        $client = $clientLog->getClient();
        echo "> getClient() => ".$client."\n";
        echo "> setClient() => ".$clientLog->setClient($client)."\n";
        $this->assertEquals(1, $client->getId());


        $user = $clientLog->getUser();
        echo "> getUser() => ".$user."\n";
        echo "> setUser() => ".$clientLog->setUser($user)."\n";
        $this->assertEquals(1, $user->getId());

        echo "\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testClientLogInsert()
    {
        /** @var Client $client */
        $client = Client::getById(1);

        $clientLog = (new ClientLog())
            ->setMessage("This is a test from the API.")
            //->setClientId(1)
            ->setClient($client)
            //->setUserId(1)
            ->setUser(User::getByEmail("rspaeth@mvqn.net"))
            ->setCreatedDate(new \DateTime());

        echo ">>> ClientLog::insert()\n";
        print_r($clientLog);
        echo "\n";

        //$clientLog->insert();

        $this->assertTrue(true);
    }

    public function testClientLogUpdate()
    {
        /** @var ClientLog $clientLog */
        $clientLog = ClientLog::getById(1);

        $clientLog
            ->setCreatedDate(new \DateTime("01/01/2018"));

        echo ">>> ClientLog::update()\n";
        print_r($clientLog);
        echo "\n";

        //$clientLog->update();

        $this->assertTrue(true);
    }

}
