<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\Collections\Collection;
use UCRM\REST\RestClient;

class _01_GeneralTests extends \PHPUnit\Framework\TestCase
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

    public function testVersionGet()
    {
        $versions = Version::get();
        $this->assertNotEmpty($versions);

        echo ">>> Version::get()\n";

        foreach($versions as $version)
            echo $version."\n";

        echo "\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testCountryGet()
    {
        $countries = new Collection(Country::class, Country::get());
        $this->assertNotNull($countries);

        echo ">>> Country::get()\n";
        echo $countries."\n";
        echo "\n";
    }

    public function testCountryGetById()
    {
        $country = Country::getById(249);
        $this->assertNotNull($country);

        echo ">>> Country::getById(249)\n";
        echo $country."\n";
        echo "\n";
    }

    public function testCountryGetByName()
    {
        /** @var Country $country */
        $country = Country::getByName("United States");
        $this->assertEquals("United States", $country->getName());

        echo ">>> Country::getByName('United States')\n";
        echo $country."\n";
        echo "\n";
    }

    public function testCountryGetByCode()
    {
        /** @var Country $country */
        $country = Country::getByCode("US");
        $this->assertEquals("US", $country->getCode());

        echo ">>> Country::getByCode('US')\n";
        echo $country."\n";
        echo "\n";
    }

    public function testCountryGetStates()
    {
        /** @var Country $country */
        $country = Country::getById(249);
        $this->assertNotNull($country);

        $states = $country->getStates();
        $this->assertGreaterThanOrEqual(50, $states->count());

        echo ">>> Country::getById(249)->getStates()\n";
        echo $states."\n";
        echo "\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testCurrencyGet()
    {
        $currencies = new Collection(Currency::class, Currency::get());
        $this->assertNotNull($currencies);

        echo ">>> Currency::get()\n";
        echo $currencies."\n";
        echo "\n";
    }

    public function testCurrencyGetById()
    {
        $currency = Currency::getById(33);
        $this->assertNotNull($currency);

        echo ">>> Currency::getById(249)\n";
        echo $currency."\n";
        echo "\n";
    }

    public function testCurrencyGetByName()
    {
        /** @var Currency $currency */
        $currency = Currency::getByName("Dollars");
        $this->assertEquals("Dollars", $currency->getName());

        echo ">>> Currency::getByName('Dollars')\n";
        echo $currency."\n";
        echo "\n";
    }

    public function testCurrencyGetByCode()
    {
        /** @var Currency $currency */
        $currency = Currency::getByCode("USD");
        $this->assertEquals("USD", $currency->getCode());

        echo ">>> Currency::getByCode('USD')\n";
        echo $currency."\n";
        echo "\n";
    }

    public function testCurrencyGetBySymbol()
    {
        /** @var Currency $currency */
        $currency = Currency::getBySymbol("$");
        $this->assertEquals("$", $currency->getSymbol());

        echo ">>> Currency::getBySymbol('$')\n";
        echo $currency."\n";
        echo "\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testStateGetById()
    {
        /** @var State $state */
        $state = State::getById(28);
        $this->assertEquals(28, $state->getId());

        echo ">>> State::getById(28)\n";
        echo $state."\n";
        echo "\n";
    }

    public function testStateGetByName()
    {
        /** @var Country $country */
        $country = Country::getById(249);

        $state = State::getByName($country, "Nevada");
        $this->assertEquals("Nevada", $state->getName());

        echo ">>> State::getByName('Nevada')\n";
        echo $state."\n";
        echo "\n";
    }

    public function testStateGetByCode()
    {
        /** @var Country $country */
        $country = Country::getById(249);

        $state = State::getByCode($country, "NV");
        $this->assertEquals("NV", $state->getCode());

        echo ">>> State::getByCode('NV')\n";
        echo $state."\n";
        echo "\n";
    }



}
