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
        $client->setLastName("Worthen");

        $updated = $client->update();
        //$updated = Client::patch(1, new Client());

        echo ">>> \$client = Client::getById(1)\n";
        echo ">>> \$client->setLastName('WorthenMan!')\n";
        echo ">>> \$client->update()\n";
        echo ($updated === null) ? "NULL\n" : $updated."\n";
        echo "\n";
    }



}
