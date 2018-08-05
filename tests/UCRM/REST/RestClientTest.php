<?php
declare(strict_types=1);

namespace UCRM\REST;



class RestClientTest extends \PHPUnit\Framework\TestCase
{
    /** @var string Location of the .env file for development. */
    protected const DOTENV_PATH = __DIR__."/../../../";

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



    /**
     * Tests for the existence of a base URL.
     *
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function testBaseUrl()
    {
        $baseUrl = RestClient::baseUrl();
        $this->assertNotEmpty($baseUrl);

        echo "$baseUrl\n";
    }

    /**
     * Tests for the existence of an App Key.
     *
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function testUcrmKey()
    {
        $ucrmKey = RestClient::ucrmKey();
        $this->assertNotEmpty($ucrmKey);

        echo "$ucrmKey\n";
    }



    /**
     * Tests the single HTTP GET functionality of the RestClient.
     *
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function testGet()
    {
        $version = RestClient::get("/version");
        $this->assertArrayHasKey("version", $version);

        $json = json_encode($version, JSON_UNESCAPED_SLASHES);
        echo "$json\n";
    }

    /**
     * Tests the multiple HTTP GET functionality of the RestClient.
     *
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function testGetMany()
    {
        $results = RestClient::getMany([
            "/version",
            "/countries"
        ]);
        $this->assertCount(2, $results);

        $json = json_encode($results, JSON_UNESCAPED_SLASHES);
        echo "$json\n";
    }



    /**
     * Tests the single HTTP POST functionality of the RestClient.
     */
    public function testPost()
    {
        $this->markTestSkipped("Implement when test data is available!");
    }

    /**
     * Tests the multiple HTTP POST functionality of the RestClient.
     */
    public function testPostMany()
    {
        $this->markTestSkipped("Implement when test data is available!");
    }

}
