<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\Exceptions\RestClientException;
use UCRM\REST\RestClient;



class StateTest extends \PHPUnit\Framework\TestCase
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



    /**
     * Tests State::get()
     *
     * @throws RestClientException Should ALWAYS throw an exception, as this endpoint cannot be called this way!
     */
    public function testGetException()
    {
        $this->expectException(RestClientException::class);
        $states = State::get();

        // Should not make it here, Exception thrown above!
        foreach($states as $state)
            echo $state."\n";
    }

    /**
     * Tests Country::getById()->getStates()
     */
    public function testGet()
    {
        /** @var Country $country */
        $country = Country::getById(249);
        $this->assertInstanceOf(Country::class, $country);

        /** @var State[] $states */
        $states = $country->getStates();
        $this->assertNotEmpty($states);

        foreach($states as $state)
            echo $state."\n";
    }

    /**
     * Tests State::getById()
     */
    public function testGetById()
    {
        $state = State::getById(28);
        $this->assertInstanceOf(State::class, $state);

        echo $state."\n";
    }

    /**
     * Tests State::getById()->getCountry()
     */
    public function testGetCountry()
    {
        /** @var State $state */
        $state = State::getById(28);
        $this->assertInstanceOf(State::class, $state);

        /** @var Country $country */
        $country = $state->getCountry();
        $this->assertInstanceOf(Country::class, $country);

        echo $country."\n";
    }

}
