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
            APIB::download();

        $this->assertFileExists($path);
    }


    public function testFindObjects()
    {
        $beta = self::USE_BETA;

        //APIB::findObjects($beta);

        //$json = APIB::toJSON();


        $data = APIB::parse();

        //echo json_encode($data["classes"]["Service"], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)."\n";


    }










}
