## Country

**GET**:
- [All States by Country](#all-states-by-country)
- [State by ID](#state-by-id)
- [State by Name](#state-by-name)
- [State by Code](#state-by-code)

#### All States by Country
> /countries/<span style="color:red">countryId</span>/states

###### Example
```php
<?php

use UCRM\REST\Endpoints\Country;
use UCRM\REST\Endpoints\Collections\StateCollection;

/** @var Country $country */
$country = Country::getById(249);

/** @var StateCollection $states */
$states = $country->getStates();

echo $states;
```

###### Output
*NOTE: Formatting altered for claridy, all real output is in minified JSON.*
```json
[
	{"id":1,"countryId":249,"name":"Alabama","code":"AL"},
	{"id":2,"countryId":249,"name":"Alaska","code":"AK"},
	{"id":3,"countryId":249,"name":"Arizona","code":"AZ"},
	{"id":4,"countryId":249,"name":"Arkansas","code":"AR"},
	{"id":5,"countryId":249,"name":"California","code":"CA"},
	{"id":6,"countryId":249,"name":"Colorado","code":"CO"},
	{"id":7,"countryId":249,"name":"Connecticut","code":"CT"},
	{"id":8,"countryId":249,"name":"Delaware","code":"DE"},
	{"id":64,"countryId":249,"name":"District of Columbia","code":"DC"},
	{"id":9,"countryId":249,"name":"Florida","code":"FL"},
	{"id":10,"countryId":249,"name":"Georgia","code":"GA"},
	{"id":11,"countryId":249,"name":"Hawaii","code":"HI"},
	{"id":12,"countryId":249,"name":"Idaho","code":"ID"},
	{"id":13,"countryId":249,"name":"Illinois","code":"IL"},
	{"id":14,"countryId":249,"name":"Indiana","code":"IN"},
	{"id":15,"countryId":249,"name":"Iowa","code":"IA"},
	{"id":16,"countryId":249,"name":"Kansas","code":"KS"},
	{"id":17,"countryId":249,"name":"Kentucky","code":"KY"},
	{"id":18,"countryId":249,"name":"Louisiana","code":"LA"},
	{"id":19,"countryId":249,"name":"Maine","code":"ME"},
	{"id":20,"countryId":249,"name":"Maryland","code":"MD"},
	{"id":21,"countryId":249,"name":"Massachusetts","code":"MA"},
	{"id":22,"countryId":249,"name":"Michigan","code":"MI"},
	{"id":23,"countryId":249,"name":"Minnesota","code":"MN"},
	{"id":24,"countryId":249,"name":"Mississippi","code":"MS"},
	{"id":25,"countryId":249,"name":"Missouri","code":"MO"},
	{"id":26,"countryId":249,"name":"Montana","code":"MT"},
	{"id":27,"countryId":249,"name":"Nebraska","code":"NE"},
	{"id":28,"countryId":249,"name":"Nevada","code":"NV"},
	{"id":29,"countryId":249,"name":"New Hampshire","code":"NH"},
	{"id":30,"countryId":249,"name":"New Jersey","code":"NJ"},
	{"id":31,"countryId":249,"name":"New Mexico","code":"NM"},
	{"id":32,"countryId":249,"name":"New York","code":"NY"},
	{"id":33,"countryId":249,"name":"North Carolina","code":"NC"},
	{"id":34,"countryId":249,"name":"North Dakota","code":"ND"},
	{"id":35,"countryId":249,"name":"Ohio","code":"OH"},
	{"id":36,"countryId":249,"name":"Oklahoma","code":"OK"},
	{"id":37,"countryId":249,"name":"Oregon","code":"OR"},
	{"id":38,"countryId":249,"name":"Pennsylvania","code":"PA"},
	{"id":39,"countryId":249,"name":"Rhode Island","code":"RI"},
	{"id":40,"countryId":249,"name":"South Carolina","code":"SC"},
	{"id":41,"countryId":249,"name":"South Dakota","code":"SD"},
	{"id":42,"countryId":249,"name":"Tennessee","code":"TN"},
	{"id":43,"countryId":249,"name":"Texas","code":"TX"},
	{"id":44,"countryId":249,"name":"Utah","code":"UT"},
	{"id":45,"countryId":249,"name":"Vermont","code":"VT"},
	{"id":46,"countryId":249,"name":"Virginia","code":"VA"},
	{"id":47,"countryId":249,"name":"Washington","code":"WA"},
	{"id":48,"countryId":249,"name":"West Virginia","code":"WV"},
	{"id":49,"countryId":249,"name":"Wisconsin","code":"WI"},
	{"id":50,"countryId":249,"name":"Wyoming","code":"WY"}
]
```


#### State by ID

###### Example
```php
<?php

use UCRM\REST\Endpoints\State;

/** @var State $state */
$state = State::getById(28);

echo $state;
```

###### Output
```json
{"id":28,"countryId":249,"name":"Nevada","code":"NV"}
```


#### State by Name

###### Example
```php
<?php

use UCRM\REST\Endpoints\Country;
use UCRM\REST\Endpoints\State;

/** @var Country $country */
$country = Country::getById(249);

/** @var State $state */
$state = State::getByName($country, "Nevada");

echo $state;
```

###### Output
```json
{"id":28,"countryId":249,"name":"Nevada","code":"NV"}
```


#### State by Code

###### Example
```php
<?php

use UCRM\REST\Endpoints\Country;
use UCRM\REST\Endpoints\State;

/** @var Country $country */
$country = Country::getById(249);

/** @var State $state */
$state = State::getByCode($country, "NV");

echo $state;
```

###### Output
```json
{"id":28,"countryId":249,"name":"Nevada","code":"NV"}
```