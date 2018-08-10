<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;



class _02_ClientTests extends \PHPUnit\Framework\TestCase
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

    public function testGetters()
    {
        $client = Client::getById(1);
        $this->assertNotEmpty($client);

        echo ">>> Client::getX()\n";

        $reflection = new \ReflectionClass(Client::class);
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PROTECTED);

        foreach($properties as $property)
        {
            $name = $property->getName();
            $func = "get".ucfirst($name);

            $value = $client->$func();

            if(is_array($value))
                echo ">   Client::get".ucfirst($name)."() => ".json_encode($value, JSON_UNESCAPED_SLASHES)."\n";
            else
                echo ">   Client::get".ucfirst($name)."() => $value\n";


        }


        echo "\n";





    }








    public function testGet()
    {
        $clients = Client::get();
        $this->assertNotEmpty($clients);

        echo ">>> Client::get()\n";

        foreach($clients as $client)
            echo $client."\n";

        echo "\n";
    }

    public function testGetById()
    {
        $client = Client::getById(1);
        $this->assertInstanceOf(Client::class, $client);

        echo ">>> Client::getById(1)\n";
        echo $client."\n";
        echo "\n";
    }

    public function testSendInvitation()
    {
        $client = Client::getById(1)->sendInvitationEmail();
        $this->assertNotNull($client);

        echo ">>> Client::getById(1)->sendInvitationEmail()\n";
        echo $client."\n";
        echo "\n";
    }



    public function testUpdate()
    {
        $client = Client::getById(1);
        $client->minimal("patch");

        $name = "Worthen".rand(0, 9);

        $client->setLastName($name);

        if($client->validate("patch", $missing))
        {
            $json = $client->toJSON("patch");
            echo $json."\n";

            $updated = $client->update();
            $this->assertEquals($name ,$updated->getLastName());
        }
        else
        {
            echo "MISSING: ";
            print_r($missing);
            echo "\n";
        }




    }



}
