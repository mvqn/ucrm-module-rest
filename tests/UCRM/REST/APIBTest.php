<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;
use UCRM\REST\APIB;


class APIBTest extends \PHPUnit\Framework\TestCase
{
    /** @var string Location of the .env file for development. */
    protected const DOTENV_PATH = __DIR__."/../../../";

    protected const USE_BETA = true;




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


    public function testDownload()
    {
        $beta = self::USE_BETA;
        $path = __DIR__."/../../../src/UCRM/REST/Blueprints/ucrm".($beta ? "beta" : "").".apib";

        if(!file_exists($path))
            APIB::download($beta);

        $this->assertFileExists($path);
    }

    /** @var string */
    protected $apib = "";

    public function testLoad()
    {
        $beta = self::USE_BETA;
        $path = __DIR__."/../../../src/UCRM/REST/Blueprints/ucrm".($beta ? "beta" : "").".apib";

        $this->apib = APIB::load($beta);
        $this->assertNotNull($this->apib);
    }

    public function testSave()
    {
        $beta = self::USE_BETA;
        $path = __DIR__."/../../../src/UCRM/REST/Blueprints/ucrm".($beta ? "beta" : "").".apib";

        if($this->apib)
            APIB::save($this->apib, $beta);

        $this->assertFileExists($path);
    }

    public function testParse()
    {
        $beta = self::USE_BETA;
        $path = __DIR__."/../../../src/UCRM/REST/Blueprints/ucrm".($beta ? "beta" : "").".apib";

        $json = "";

        if($this->apib)
            APIB::save($this->apib, $beta);

        $this->assertFileExists($path);
    }




    public function testFindObjects()
    {
        $beta = self::USE_BETA;
        //$apib = APIB::download($beta);
        //$json = APIB::parse($apib);


        $json = file_get_contents(__DIR__."/../../../src/UCRM/REST/Blueprints/ucrmbeta.json");
        $objects = APIB::findObjects($json);

        foreach($objects as $object)
        {

        }

        //echo json_encode($objects["classes"]["Service"], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)."\n";




    }










}
