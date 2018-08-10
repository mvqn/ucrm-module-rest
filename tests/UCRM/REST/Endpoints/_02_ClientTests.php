<?php
declare(strict_types=1);

namespace UCRM\REST\Endpoints;

use UCRM\REST\RestClient;



class _02_ClientTests extends \PHPUnit\Framework\TestCase
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
     * Tests all Client getter methods!
     *
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function testGetters()
    {
        $client = Client::getById(1);
        $this->assertNotEmpty($client);

        echo ">>> ClientTests->testGetters()\n";

        $reflection = new \ReflectionClass(Client::class);
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PROTECTED);

        foreach($properties as $property)
        {
            $name = $property->getName();
            $func = "get".ucfirst($name);

            $value = $client->$func();

            if(is_array($value))
                echo ">   Client::get".ucfirst($name)."() => ".json_encode($value, JSON_UNESCAPED_SLASHES)."\n";
            else
                echo ">   Client::get".ucfirst($name)."() => $value\n";
        }

        echo "\n";
    }

    /**
     * Tests Client::get()
     *
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function testGet()
    {
        $clients = Client::get();
        $this->assertNotEmpty($clients);

        echo ">>> Client::get()\n";

        foreach($clients as $client)
            echo $client."\n";

        echo "\n";
    }

    /**
     * Tests Client::getById(1)
     *
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function testGetById()
    {
        $client = Client::getById(1);
        $this->assertInstanceOf(Client::class, $client);

        echo ">>> Client::getById(1)\n";
        echo $client."\n";
        echo "\n";
    }

    /**
     * Tests Client->sendInvitationEmail()
     *
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     */
    public function testSendInvitation()
    {
        $client = Client::getById(1)->sendInvitationEmail();
        $this->assertNotNull($client);

        echo ">>> Client::getById(1)->sendInvitationEmail()\n";
        echo $client."\n";
        echo "\n";
    }

    /**
     * Tests Client->update()
     *
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     * @throws \UCRM\REST\Exceptions\RestObjectException
     */
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
        }
        else
        {
            echo ">>> MISSING: ";
            print_r($missing);
            echo "\n";
        }
    }

    /**
     * @throws \MVQN\Annotations\AnnotationReaderException
     * @throws \MVQN\Helpers\ArrayHelperPathException
     * @throws \MVQN\Helpers\PatternMatchException
     * @throws \ReflectionException
     * @throws \UCRM\REST\Exceptions\RestClientException
     * @throws \UCRM\REST\Exceptions\RestObjectException
     */
    public function testInsert()
    {
        $this->markTestSkipped("No need to insert additional Clients!");

        $organizations = Organization::get();

        $client = new Client();
        $client
            // REQUIRED: Organization (NOT AVAILABLE ON EDIT SCREEN)
            ->setOrganizationId($organizations[0]->getId())

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

        $inserted = $client->insert();

        print_r($inserted);
    }





}
