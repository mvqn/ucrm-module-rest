<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;



class _01_GeneralTests extends \PHPUnit\Framework\TestCase
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


    public function testGetVersion()
    {
        $versions = Version::get();
        $this->assertNotEmpty($versions);

        echo ">>> Version::get()\n";

        foreach($versions as $version)
            echo $version."\n";

        echo "\n";
    }

    public function testGetCountries()
    {
        $countries = Country::get();
        $this->assertNotEmpty($countries);

        echo ">>> Country::get()\n";

        foreach($countries as $country)
            echo $country."\n";

        echo "\n";
    }

    public function testGetCountryById()
    {
        $country = Country::getById(249);
        $this->assertNotNull($country);

        echo ">>> Country::getById(249)\n";
        echo $country."\n";
        echo "\n";
    }

    public function testGetStates()
    {
        /** @var Country $country */
        $country = Country::getById(249);
        $this->assertNotNull($country);

        $states = $country->getStates();

        echo ">>> Country::getById(249)->getStates()\n";

        foreach($states as $state)
            echo $state."\n";

        echo "\n";
    }

    public function testGetStateById()
    {
        /** @var State $state */
        $state = State::getById(28);
        $this->assertNotNull($state);

        echo ">>> State::getById(28)\n";
        echo $state."\n";
        echo "\n";
    }



}
