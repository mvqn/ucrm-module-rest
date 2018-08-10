<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;



class RestObjectTests extends \PHPUnit\Framework\TestCase
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

    protected $client = null;

    public function testToFields()
    {
        $country = Country::getById(249);
        echo $country->toJSON()."\n";

        $states = $country->getStates();
        foreach($states as $state)
            echo $state->toJSON()."\n";

        $nevada = State::getById(28);
        echo $nevada->toJSON()."\n";


        die();

        if($this->client === null)
            $this->client = Client::getById(1);

        $fields = $this->client->toJSON("post", JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        $this->assertNotNull($fields);
        $this->assertNotEmpty($fields);

        echo $fields."\n";
    }

    public function testToFieldsFiltered()
    {
        die();

        if($this->client === null)
            $this->client = Client::getById(1);

        $fields = $this->client->toJSON("post", JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES, true);

        $this->assertNotNull($fields);
        $this->assertNotEmpty($fields);

        echo $fields."\n";
    }




}
