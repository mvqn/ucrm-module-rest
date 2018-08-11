<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;



class _04_ClientLogTests extends \PHPUnit\Framework\TestCase
{
    /** @var string Location of the .env file for development. */
    protected const DOTENV_PATH = __DIR__."/../../../../";



    /**
     * Sets up the RestClient for testing.
     *
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
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



    public function testGet()
    {

        $clientLogs = ClientLog::get();
        $this->assertNotEmpty($clientLogs);

        foreach($clientLogs as $clientLog)
            echo $clientLog."\n";
    }


    public function testGetById()
    {
        $clientLog = ClientLog::getById(1);
        $this->assertInstanceOf(ClientLog::class, $clientLog);

        echo $clientLog."\n";
    }


    public function testGetters()
    {
        $log = ClientLog::getById(1);
        $this->assertNotEmpty($log);

        echo ">>> ClientTests->testGetters()\n";

        $reflection = new \ReflectionClass(ClientLog::class);
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PROTECTED);

        foreach($properties as $property)
        {
            $name = $property->getName();
            $func = "get".ucfirst($name);

            $value = $log->$func();

            if(is_array($value))
                echo ">   ClientLog::get".ucfirst($name)."() => ".json_encode($value, JSON_UNESCAPED_SLASHES)."\n";
            else
                echo ">   ClientLog::get".ucfirst($name)."() => $value\n";
        }

        echo "\n";
    }

    public function testSetters()
    {
        $log = new ClientLog();

        $log
            //->setClientId(1)
            ->setClientByName("Dwight", "Worthen")
            //->setUserId(1)
            //->setUserByName("Ryan", "Spaeth")
            ->setUserByEmail("rspaeth@mvqn.net")
            ->setCreatedDate(new \DateTime())
            ->setMessage("This is a another test entry from the API!");

        print_r($log);


        //$log->insert();


    }


}
