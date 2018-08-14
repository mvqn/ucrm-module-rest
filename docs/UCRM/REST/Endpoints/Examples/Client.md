# Country

**GET**:
- [All Clients](#all-clients)
- [Client by ID](#client-by-id)

**POST**:
- [Insert Client](#insert-client)

**PATCH**:
- [Update Client](#update-client)
- [Send Invitation Email](#send-invitation-email)

**ERRORS:**
- [Missing Fields](#missing-fields)


&nbsp;
## All Clients
```
GET /clients
```

#### Example
```php
<?php

use UCRM\REST\Endpoints\Client;
use UCRM\REST\Endpoints\Collections\ClientCollection;

/** @var ClientCollection $clients */
$clients = Client::get();

echo $clients;
```

#### Output
> *NOTE: Formatting altered for clarity, all real output is in minified JSON.*
```json
[
  {
    "id": 1,
    "userIdent": null,
    "organizationId": 1,
    "isLead": false,
    "clientType": 2,
    "companyName": "United States Government",
    "companyRegistrationNumber": "12345",
    "companyTaxId": "12-3456789",
    "companyWebsite": "https://www.usa.gov/",
    "companyContactFirstName": "Donald",
    "companyContactLastName": "Trump",
    "firstName": null,
    "lastName": null,
    "street1": "1600 Pennsylvania Avenue NW",
    "street2": null,
    "city": "Washington",
    "countryId": 249,
    "stateId": 64,
    "zipCode": "20500",
    "invoiceAddressSameAsContact": true,
    "invoiceStreet1": null,
    "invoiceStreet2": null,
    "invoiceCity": null,
    "invoiceCountryId": null,
    "invoiceStateId": null,
    "invoiceZipCode": null,
    "sendInvoiceByPost": true,
    "invoiceMaturityDays": 30,
    "stopServiceDue": true,
    "stopServiceDueDays": 10,
    "tax1Id": null,
    "tax2Id": null,
    "tax3Id": null,
    "registrationDate": "2018-08-12T00:00:00-0700",
    "previousIsp": "ARPANET",
    "note": "President of the United States of America!",
    "username": null,
    "avatarColor": null,
    "contacts": [],
    "attributes": [],
    "accountBalance": -58,
    "accountCredit": 0,
    "accountOutstanding": 58,
    "currencyCode": "USD",
    "organizationName": "ACME Internet Services",
    "bankAccounts": [],
    "invitationEmailSentDate": null,
    "tags": [],
    "isActive": false,
    "addressGpsLat": null,
    "addressGpsLon": null
  }
]
```


&nbsp;
## Client by ID
```
GET /clients/{clientId}
```

#### Example
```php
<?php

use UCRM\REST\Endpoints\Client;

/** @var Client $client */
$client = Client::getById(1);

echo $client;
```

#### Output
> *NOTE: Formatting altered for clarity, all real output is in minified JSON.*
```json
{
    "id": 1,
    "userIdent": null,
    "organizationId": 1,
    "isLead": false,
    "clientType": 2,
    "companyName": "United States Government",
    "companyRegistrationNumber": "12345",
    "companyTaxId": "12-3456789",
    "companyWebsite": "https://www.usa.gov/",
    "companyContactFirstName": "Donald",
    "companyContactLastName": "Trump",
    "firstName": null,
    "lastName": null,
    "street1": "1600 Pennsylvania Avenue NW",
    "street2": null,
    "city": "Washington",
    "countryId": 249,
    "stateId": 64,
    "zipCode": "20500",
    "invoiceAddressSameAsContact": true,
    "invoiceStreet1": null,
    "invoiceStreet2": null,
    "invoiceCity": null,
    "invoiceCountryId": null,
    "invoiceStateId": null,
    "invoiceZipCode": null,
    "sendInvoiceByPost": true,
    "invoiceMaturityDays": 30,
    "stopServiceDue": true,
    "stopServiceDueDays": 10,
    "tax1Id": null,
    "tax2Id": null,
    "tax3Id": null,
    "registrationDate": "2018-08-12T00:00:00-0700",
    "previousIsp": "ARPANET",
    "note": "President of the United States of America!",
    "username": null,
    "avatarColor": null,
    "contacts": [],
    "attributes": [],
    "accountBalance": -58,
    "accountCredit": 0,
    "accountOutstanding": 58,
    "currencyCode": "USD",
    "organizationName": "ACME Internet Services",
    "bankAccounts": [],
    "invitationEmailSentDate": null,
    "tags": [],
    "isActive": false,
    "addressGpsLat": null,
    "addressGpsLon": null
  }
```


&nbsp;
## Insert Client
```
POST /clients
```

#### Example
```php
<?php

use UCRM\REST\Endpoints\Organization;
use UCRM\REST\Endpoints\Client;

/** @var Organization $organization */
$organization = Organization::getByDefault();

/** @var Client $client */
$client = (new Client())
    ->setOrganization($organization)
    ->setIsLead(true)
    ->setClientType(Client::CLIENT_TYPE_RESIDENTIAL)
    ->setFirstName("Ronald")
    ->setLastName("Reagan")
    ->setInvoiceAddressSameAsContact(true)
    ->setRegistrationDate(new \DateTime());

$inserted = $client->insert();

echo $inserted;
```

#### Output
```json
{
  "id": 2,
  "userIdent": null,
  "organizationId": 1,
  "isLead": true,
  "clientType": 1,
  "companyName": null,
  "companyRegistrationNumber": null,
  "companyTaxId": null,
  "companyWebsite": null,
  "companyContactFirstName": null,
  "companyContactLastName": null,
  "firstName": "Ronald",
  "lastName": "Reagan",
  "street1": null,
  "street2": null,
  "city": null,
  "countryId": null,
  "stateId": null,
  "zipCode": null,
  "invoiceAddressSameAsContact": true,
  "invoiceStreet1": null,
  "invoiceStreet2": null,
  "invoiceCity": null,
  "invoiceCountryId": null,
  "invoiceStateId": null,
  "invoiceZipCode": null,
  "sendInvoiceByPost": null,
  "invoiceMaturityDays": null,
  "stopServiceDue": null,
  "stopServiceDueDays": null,
  "tax1Id": null,
  "tax2Id": null,
  "tax3Id": null,
  "registrationDate": "2018-08-14T15:58:24-0700",
  "previousIsp": null,
  "note": null,
  "username": null,
  "avatarColor": null,
  "contacts": [],
  "attributes": [],
  "accountBalance": 0,
  "accountCredit": 0,
  "accountOutstanding": 0,
  "currencyCode": "USD",
  "organizationName": "ACME Internet Services",
  "bankAccounts": [],
  "invitationEmailSentDate": null,
  "tags": [],
  "isActive": false,
  "addressGpsLat": null,
  "addressGpsLon": null
}
```


&nbsp;
## Update Client
```
PATCH /clients/{clientId}
```

#### Example
```php
<?php

use UCRM\REST\Endpoints\Client;

/** @var Client $client */
$client = Client::getById(2);
$client
    ->setStreet1("1234 Some Street")
    ->setCity("Las Vegas")
    ->setCountryByCode("US")
    ->setStateByCode("NV")
    ->setZipCode("12345");

$updated = $client->update();

echo $updated;
```

#### Output
```json
{
  "id": 2,
  "userIdent": null,
  "organizationId": 1,
  "isLead": true,
  "clientType": 1,
  "companyName": null,
  "companyRegistrationNumber": null,
  "companyTaxId": null,
  "companyWebsite": null,
  "companyContactFirstName": null,
  "companyContactLastName": null,
  "firstName": "Ronald",
  "lastName": "Reagan",
  "street1": "1234 Some Street",
  "street2": null,
  "city": "Las Vegas",
  "countryId": 249,
  "stateId": 28,
  "zipCode": "12345",
  "invoiceAddressSameAsContact": true,
  "invoiceStreet1": null,
  "invoiceStreet2": null,
  "invoiceCity": null,
  "invoiceCountryId": null,
  "invoiceStateId": null,
  "invoiceZipCode": null,
  "sendInvoiceByPost": null,
  "invoiceMaturityDays": null,
  "stopServiceDue": null,
  "stopServiceDueDays": null,
  "tax1Id": null,
  "tax2Id": null,
  "tax3Id": null,
  "registrationDate": "2018-08-14T15:58:24-0700",
  "previousIsp": null,
  "note": null,
  "username": null,
  "avatarColor": null,
  "contacts": [],
  "attributes": [],
  "accountBalance": 0,
  "accountCredit": 0,
  "accountOutstanding": 0,
  "currencyCode": "USD",
  "organizationName": "ACME Internet Services",
  "bankAccounts": [],
  "invitationEmailSentDate": null,
  "tags": [],
  "isActive": false,
  "addressGpsLat": null,
  "addressGpsLon": null
}
```


&nbsp;
## Send Invitation Email
```
PATCH /clients/{clientId}/send-invitation
```

#### Example
```php
<?php

use UCRM\REST\Endpoints\Client;

/** @var Client $client */
$client = Client::getById(2);

$notified = $client->sendInvitationEmail();

echo $notified;
```

#### Output
```json
{
  "id": 2,
  "userIdent": null,
  "organizationId": 1,
  "isLead": true,
  "clientType": 1,
  "companyName": null,
  "companyRegistrationNumber": null,
  "companyTaxId": null,
  "companyWebsite": null,
  "companyContactFirstName": null,
  "companyContactLastName": null,
  "firstName": "Ronald",
  "lastName": "Reagan",
  "street1": "1234 Some Street",
  "street2": null,
  "city": "Las Vegas",
  "countryId": 249,
  "stateId": 28,
  "zipCode": "12345",
  "invoiceAddressSameAsContact": true,
  "invoiceStreet1": null,
  "invoiceStreet2": null,
  "invoiceCity": null,
  "invoiceCountryId": null,
  "invoiceStateId": null,
  "invoiceZipCode": null,
  "sendInvoiceByPost": null,
  "invoiceMaturityDays": null,
  "stopServiceDue": null,
  "stopServiceDueDays": null,
  "tax1Id": null,
  "tax2Id": null,
  "tax3Id": null,
  "registrationDate": "2018-08-14T15:58:24-0700",
  "previousIsp": null,
  "note": null,
  "username": null,
  "avatarColor": null,
  "contacts": [],
  "attributes": [],
  "accountBalance": 0,
  "accountCredit": 0,
  "accountOutstanding": 0,
  "currencyCode": "USD",
  "organizationName": "ACME Internet Services",
  "bankAccounts": [],
  "invitationEmailSentDate": null,
  "tags": [],
  "isActive": false,
  "addressGpsLat": null,
  "addressGpsLon": null
}
```


&nbsp;
## Missing Fields

#### Response
If not all necessary fields are provided prior to calling the `insert()` or `update()` methods, output from the REST API
will come back as similar to below:
```
UCRM\REST\Endpoints\Exceptions\EndpointException : Data for endpoint '/clients' was improperly formatted!
Validation failed.
{
    "isLead": [
        "This value is not valid."
    ],
    "clientType": [
        "This value is not valid."
    ],
    "invoiceAddressSameAsContact": [
        "This value is not valid."
    ],
    "organizationId": [
        "This value is not valid."
    ],
    "registrationDate": [
        "This value is not valid."
    ]
}
```

#### Solution
To prevent this from occuring, it is advised to use the `validate()` method prior to any `insert()` or `update()` calls,
as illustrated below: 

```php
<?php

use UCRM\REST\Endpoints\Client;

// Client intentionally left empty!
$client = new Client();

// Validate the Client prior to attempting to insert() 
if(!$client->validate("post", $missing))
{
    // Display the missing properties!
    print_r($missing);
}
else
{
    // Everything was fine, it should be safe to insert()
    $client->insert();
}
```

The `validate()` method provides a list of **missing** required field values and will output something similar to the
following:  

```
Array
(
    [0] => isLead
    [1] => clientType
    [2] => invoiceAddressSameAsContact
    [3] => organizationId
    [4] => registrationDate
)
```

#### Known Limitations

- The validate() method only checks that the properties have been set.  No actual validation of the values provided is
done!

- Once 'clientType' is validated, there is still the requirement of 'firstName' and 'lastName' for Residential Clients
and 'companyName' for Commercial Clients.  Future versions of validate() will take this into account.

 
