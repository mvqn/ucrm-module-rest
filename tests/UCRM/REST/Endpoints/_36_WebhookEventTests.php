<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use MVQN\Annotations\AnnotationReader;
use MVQN\REST\RestClient;

require_once __DIR__."/TestFunctions.php";

class _36_WebhookEventTests extends \PHPUnit\Framework\TestCase
{

    // =================================================================================================================
    // INITIALIZATION
    // -----------------------------------------------------------------------------------------------------------------

    /** @var string Location of the .env file for development. */
    protected const DOTENV_PATH = __DIR__ . "/../../../../";

    protected function setUp()
    {
        // Load ENV variables from a file during development.
        if (file_exists(self::DOTENV_PATH)) {
            $dotenv = new \Dotenv\Dotenv(self::DOTENV_PATH);
            $dotenv->load();
        }

        //AnnotationReader::cacheDir(__DIR__);
        RestClient::cacheDir(__DIR__);

        RestClient::setBaseUrl(getenv("REST_URL"));
        RestClient::setHeaders([
            "Content-Type: application/json",
            "X-Auth-App-Key: " . getenv("REST_KEY")
        ]);
    }

    public function testGetByUuid()
    {
        $uuid = "155ee167-b4e7-4297-a4e1-8dde676051e8";

        $event = WebhookEvent::get();
        $event = WebhookEvent::getByUuid($uuid);
        $this->assertNotNull($event);

        echo ">>> WebhookEvent::getByUuid()\n";
        echo $event . "\n";
        echo "\n";
    }
}