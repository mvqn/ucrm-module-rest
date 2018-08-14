<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;
use UCRM\REST\Endpoints\Lookups\ClientContact;

require_once __DIR__."/TestFunctions.php";

class _02_ClientTests extends \PHPUnit\Framework\TestCase
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
    // GETTERS & SETTERS
    // -----------------------------------------------------------------------------------------------------------------

    public function testAllGetters()
    {
        $clients = Client::getById(1);

        $test = TestFunctions::testAllGetters($clients);
        $this->assertTrue($test);
    }


    // =================================================================================================================
    // CREATE METHDOS
    // -----------------------------------------------------------------------------------------------------------------

    public function testCreateResidential()
    {
        $this->markTestSkipped("Skip test, as to not keep generating Clients!");

        $lastName = "Doe";
        $firstName = "John".rand(1, 9);

        $inserted = Client::createResidential($firstName, $lastName, true)->insert();
        $this->assertEquals($lastName, $inserted->getLastName());

        echo $inserted."\n";
    }

    public function testCreateCommericial()
    {
        $this->markTestSkipped("Skip test, as to not keep generating Clients!");

        $lastName = "Doe";
        $firstName = "John".rand(1, 9);
        $companyName = "ACME Rockets, Inc.";

        $inserted = Client::createCommercial($companyName, $firstName, $lastName, true)->insert();
        $this->assertEquals($companyName, $inserted->getCompanyName());

        echo $inserted."\n";
    }

    public function testCreate()
    {
        $this->markTestSkipped("Skip test, as to not keep generating Clients!");

        $created =
            (Client::create())
                // DEFAULTS:
                // - clientType = Residential
                // - isLead = true
                // - invoiceAddressSameAsContact = true
                // - organizationId = Default
                // - registrationDate = NOW!
                // REQUIRED:
                ->setFirstName("John")
                ->setLastName("Doe");

        $created->insert();

        echo $created."\n";
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function testInsert()
    {
        /** @var Organization $organization */
        $organization = Organization::getByDefault();

        $client = new Client();
        $client
            // REQUIRED: Organization (NOT AVAILABLE ON EDIT SCREEN)
            ->setOrganizationId($organization->getId())

            // --- GENERAL ---------------------------------------------------------------------------------------------
            // REQUIRED (FOR COMMERCIAL): Company Name
            ->setCompanyName("United States Government")
            // Contact Person
            ->setCompanyContactFirstName("Donald")
            ->setCompanyContactLastName("Trump")
            // REQUIRED (FOR RESIDENTIAL): First Name
            //->setFirstName("Donald")
            // REQUIRED (FOR RESIDENTIAL): Last Name
            //->setLastName("Trump")
            // REQUIRED: Client Lead
            ->setIsLead(true)
            // REQUIRED: Company?
            ->setClientType(Client::CLIENT_TYPE_COMMERCIAL)
            // Registration Number
            ->setCompanyRegistrationNumber("12345")
            // Tax ID
            ->setCompanyTaxId("12-3456789")
            // Website
            ->setCompanyWebsite("https://www.usa.gov/")
            // Tags
            // TODO: Add Tag support ???
            // Note
            ->setNote("President of the United States of America!")

            // --- CONTACT ADDRESS -------------------------------------------------------------------------------------
            ->setStreet1("1600 Pennsylvania Avenue NW")
            ->setStreet2("")
            ->setCity("Washington")
            ->setCountryByName("United States")
            ->setStateByCode("DC")
            ->setZipCode("20500")

            // --- INVOICE ADDRESS -------------------------------------------------------------------------------------
            // REQUIRED: Invoice address is the same as contact address
            ->setInvoiceAddressSameAsContact(true)
            // REQUIRED (WHEN NOT THE SAME)
            //->setInvoiceStreet1("")
            //->setInvoiceStreet2("") // NOT REQUIRED!
            //->setInvoiceCity("")
            //->setInvoiceCountryByName("")
            //->setInvoiceStateByCode("")
            //->setInvoiceZipCode("")

            // --- CONTACT DETAILS -------------------------------------------------------------------------------------
            // Primary Contact
            ->addContact(
                (new ClientContact())
                    ->setEmail("potus@usa.gov.notreal")
                    ->setName("Donald Trump")
                    ->setPhone("(202) 555-1234")
                    ->setAsGeneral()
            )
            // UNIQUE: Username
            //->setUsername("potus@usa.gov.notreal")
            // Additional Contacts...
            ->addContact(
                (new ClientContact())
                    ->setEmail("accountsreceivable@usa.gov.notreal")
                    ->setName("Steven Mnuchin")
                    ->setPhone("(202) 555-5678")
                    ->setAsBilling()
            )

            // --- INVOICE OPTIONS -------------------------------------------------------------------------------------
            // NOTE: Setting any of the below options overrides the defaults.
            // Invoice by Post
            ->setSendInvoiceByPost(true)
            // Invoice maturity days
            ->setInvoiceMaturityDays(30)
            // Suspend services if payment is overdue
            ->setStopServiceDue(true)
            // Suspension delay
            ->setStopServiceDueDays(10)
            // MISSING: Late fee delay (NO API???)

            // --- TAXES -----------------------------------------------------------------------------------------------
            // Tax 1
            //->setTax1Id()
            // Tax 2
            //->setTax2Id()
            // Tax 3
            //->setTax3Id()
            // TODO: Test Taxes Later!

            // --- OTHER -----------------------------------------------------------------------------------------------
            // UNIQUE: Custom ID
            ->setUserIdent("")
            // Previous ISP
            ->setPreviousIsp("ARPANET")
            // REQUIRED: Registration date
            ->setRegistrationDate(new \DateTime());

            // --- CUSTOM ATTRIBUTES -----------------------------------------------------------------------------------
            // TODO: Test Attributes Later!

        print_r($client);

        $this->markTestSkipped("Skip so we do not keep creating Clients in the UCRM!");

        $inserted = $client->insert();
        print_r($inserted);
    }



    // =================================================================================================================
    // READ METHODS
    // -----------------------------------------------------------------------------------------------------------------

    public function testGet()
    {
        $clients = Client::get();
        $this->assertNotNull($clients);

        echo ">>> Client::get()\n";
        echo $clients."\n";
        echo "\n";
    }

    public function testGetById()
    {
        /** @var Client $first */
        $first = Client::get()->last();
        $id = $first->getId();

        /** @var Client $client */
        $client = Client::getById($id);
        $this->assertEquals($id, $client->getId());

        echo ">>> Client::getById($id)\n";
        echo $client."\n";
        echo "\n";
    }



    // =================================================================================================================
    // UPDATE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    public function testUpdate()
    {
        /** @var Client $client */
        $client = Client::getById(1);

        // Clear all non-required properties.
        $client->minimal("patch");

        // Update any setting here...
        $name = "Worthen".rand(0, 9);
        $client->setLastName($name);

        // Use the built-in reset commands to change back to system defaults.
        //$client->setSendInvoiceByPost(true);
        $client->resetSendInvoiceByPost();

        // Validate the information...
        if($client->validate("patch", $missing))
        {
            /** @var Client $updated */
            $updated = $client->update();
            $this->assertEquals($name ,$updated->getLastName());
            echo $updated."\n";
        }
        else
        {
            echo ">>> MISSING: ";
            print_r($missing);
            echo "\n";
        }
    }



    // =================================================================================================================
    // DELETE METHODS
    // -----------------------------------------------------------------------------------------------------------------

    // NO DELETE ENDPOINTS



    // =================================================================================================================
    // EXTRA METHODS
    // -----------------------------------------------------------------------------------------------------------------

    public function testSendInvitation()
    {
        $this->markTestSkipped("Skip so we do not keep attempting to send emails to Clients in the UCRM!");

        /** @var Client $client */
        $client = Client::getById(1);
        $client->sendInvitationEmail();
        $this->assertNotNull($client);

        echo ">>> Client::getById(1)->sendInvitationEmail()\n";
        echo $client."\n";
        echo "\n";
    }

}
