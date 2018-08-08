<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;



class ClientLogTest extends \PHPUnit\Framework\TestCase
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





}