## Country
#### /countries
> GET

&nbsp;

###### Example
```php
<?php

use UCRM\REST\Endpoints\Country;

$version = Country::get();

echo $version;
```

&nbsp;

###### Output
```json
[
  {
    "id": 19,
    "name": "Afghanistan",
    "code": "AF"
  },
  {
    "id": 31,
    "name": "Åland Islands",
    "code": "AX"
  },
  {
    "id": 22,
    "name": "Albania",
    "code": "AL"
  },
  {
    "id": 78,
    "name": "Algeria",
    "code": "DZ"
  },
  {
    "id": 27,
    "name": "American Samoa",
    "code": "AS"
  },
  {
    "id": 17,
    "name": "Andorra",
    "code": "AD"
  },
  {
    "id": 24,
    "name": "Angola",
    "code": "AO"
  },
  {
    "id": 21,
    "name": "Anguilla",
    "code": "AI"
  },
  {
    "id": 25,
    "name": "Antarctica",
    "code": "AQ"
  },
  {
    "id": 20,
    "name": "Antigua and Barbuda",
    "code": "AG"
  },
  {
    "id": 26,
    "name": "Argentina",
    "code": "AR"
  },
  {
    "id": 23,
    "name": "Armenia",
    "code": "AM"
  },
  {
    "id": 30,
    "name": "Aruba",
    "code": "AW"
  },
  {
    "id": 29,
    "name": "Australia",
    "code": "AU"
  },
  {
    "id": 28,
    "name": "Austria",
    "code": "AT"
  },
  {
    "id": 32,
    "name": "Azerbaijan",
    "code": "AZ"
  },
  {
    "id": 48,
    "name": "Bahamas",
    "code": "BS"
  },
  {
    "id": 39,
    "name": "Bahrain",
    "code": "BH"
  },
  {
    "id": 35,
    "name": "Bangladesh",
    "code": "BD"
  },
  {
    "id": 34,
    "name": "Barbados",
    "code": "BB"
  },
  {
    "id": 52,
    "name": "Belarus",
    "code": "BY"
  },
  {
    "id": 36,
    "name": "Belgium",
    "code": "BE"
  },
  {
    "id": 53,
    "name": "Belize",
    "code": "BZ"
  },
  {
    "id": 41,
    "name": "Benin",
    "code": "BJ"
  },
  {
    "id": 43,
    "name": "Bermuda",
    "code": "BM"
  },
  {
    "id": 49,
    "name": "Bhutan",
    "code": "BT"
  },
  {
    "id": 45,
    "name": "Bolivia",
    "code": "BO"
  },
  {
    "id": 33,
    "name": "Bosnia and Herzegovina",
    "code": "BA"
  },
  {
    "id": 51,
    "name": "Botswana",
    "code": "BW"
  },
  {
    "id": 50,
    "name": "Bouvet Island",
    "code": "BV"
  },
  {
    "id": 47,
    "name": "Brazil",
    "code": "BR"
  },
  {
    "id": 122,
    "name": "British Indian Ocean Territory",
    "code": "IO"
  },
  {
    "id": 44,
    "name": "Brunei Darussalam",
    "code": "BN"
  },
  {
    "id": 38,
    "name": "Bulgaria",
    "code": "BG"
  },
  {
    "id": 37,
    "name": "Burkina Faso",
    "code": "BF"
  },
  {
    "id": 40,
    "name": "Burundi",
    "code": "BI"
  },
  {
    "id": 133,
    "name": "Cambodia",
    "code": "KH"
  },
  {
    "id": 63,
    "name": "Cameroon",
    "code": "CM"
  },
  {
    "id": 54,
    "name": "Canada",
    "code": "CA"
  },
  {
    "id": 68,
    "name": "Cape Verde",
    "code": "CV"
  },
  {
    "id": 46,
    "name": "Caribbean Netherlands ",
    "code": "BQ"
  },
  {
    "id": 140,
    "name": "Cayman Islands",
    "code": "KY"
  },
  {
    "id": 57,
    "name": "Central African Republic",
    "code": "CF"
  },
  {
    "id": 231,
    "name": "Chad",
    "code": "TD"
  },
  {
    "id": 62,
    "name": "Chile",
    "code": "CL"
  },
  {
    "id": 64,
    "name": "China",
    "code": "CN"
  },
  {
    "id": 70,
    "name": "Christmas Island",
    "code": "CX"
  },
  {
    "id": 55,
    "name": "Cocos (Keeling) Islands",
    "code": "CC"
  },
  {
    "id": 65,
    "name": "Colombia",
    "code": "CO"
  },
  {
    "id": 135,
    "name": "Comoros",
    "code": "KM"
  },
  {
    "id": 58,
    "name": "Congo",
    "code": "CG"
  },
  {
    "id": 56,
    "name": "Congo, Democratic Republic of",
    "code": "CD"
  },
  {
    "id": 61,
    "name": "Cook Islands",
    "code": "CK"
  },
  {
    "id": 66,
    "name": "Costa Rica",
    "code": "CR"
  },
  {
    "id": 60,
    "name": "Côte d'Ivoire",
    "code": "CI"
  },
  {
    "id": 114,
    "name": "Croatia",
    "code": "HR"
  },
  {
    "id": 67,
    "name": "Cuba",
    "code": "CU"
  },
  {
    "id": 69,
    "name": "Curaçao",
    "code": "CW"
  },
  {
    "id": 71,
    "name": "Cyprus",
    "code": "CY"
  },
  {
    "id": 72,
    "name": "Czech Republic",
    "code": "CZ"
  },
  {
    "id": 75,
    "name": "Denmark",
    "code": "DK"
  },
  {
    "id": 74,
    "name": "Djibouti",
    "code": "DJ"
  },
  {
    "id": 76,
    "name": "Dominica",
    "code": "DM"
  },
  {
    "id": 77,
    "name": "Dominican Republic",
    "code": "DO"
  },
  {
    "id": 79,
    "name": "Ecuador",
    "code": "EC"
  },
  {
    "id": 81,
    "name": "Egypt",
    "code": "EG"
  },
  {
    "id": 226,
    "name": "El Salvador",
    "code": "SV"
  },
  {
    "id": 104,
    "name": "Equatorial Guinea",
    "code": "GQ"
  },
  {
    "id": 83,
    "name": "Eritrea",
    "code": "ER"
  },
  {
    "id": 80,
    "name": "Estonia",
    "code": "EE"
  },
  {
    "id": 85,
    "name": "Ethiopia",
    "code": "ET"
  },
  {
    "id": 88,
    "name": "Falkland Islands",
    "code": "FK"
  },
  {
    "id": 90,
    "name": "Faroe Islands",
    "code": "FO"
  },
  {
    "id": 87,
    "name": "Fiji",
    "code": "FJ"
  },
  {
    "id": 86,
    "name": "Finland",
    "code": "FI"
  },
  {
    "id": 91,
    "name": "France",
    "code": "FR"
  },
  {
    "id": 96,
    "name": "French Guiana",
    "code": "GF"
  },
  {
    "id": 191,
    "name": "French Polynesia",
    "code": "PF"
  },
  {
    "id": 232,
    "name": "French Southern Territories",
    "code": "TF"
  },
  {
    "id": 92,
    "name": "Gabon",
    "code": "GA"
  },
  {
    "id": 101,
    "name": "Gambia",
    "code": "GM"
  },
  {
    "id": 95,
    "name": "Georgia",
    "code": "GE"
  },
  {
    "id": 73,
    "name": "Germany",
    "code": "DE"
  },
  {
    "id": 98,
    "name": "Ghana",
    "code": "GH"
  },
  {
    "id": 99,
    "name": "Gibraltar",
    "code": "GI"
  },
  {
    "id": 105,
    "name": "Greece",
    "code": "GR"
  },
  {
    "id": 100,
    "name": "Greenland",
    "code": "GL"
  },
  {
    "id": 94,
    "name": "Grenada",
    "code": "GD"
  },
  {
    "id": 103,
    "name": "Guadeloupe",
    "code": "GP"
  },
  {
    "id": 108,
    "name": "Guam",
    "code": "GU"
  },
  {
    "id": 107,
    "name": "Guatemala",
    "code": "GT"
  },
  {
    "id": 97,
    "name": "Guernsey",
    "code": "GG"
  },
  {
    "id": 102,
    "name": "Guinea",
    "code": "GN"
  },
  {
    "id": 109,
    "name": "Guinea-Bissau",
    "code": "GW"
  },
  {
    "id": 110,
    "name": "Guyana",
    "code": "GY"
  },
  {
    "id": 115,
    "name": "Haiti",
    "code": "HT"
  },
  {
    "id": 112,
    "name": "Heard and McDonald Islands",
    "code": "HM"
  },
  {
    "id": 113,
    "name": "Honduras",
    "code": "HN"
  },
  {
    "id": 111,
    "name": "Hong Kong",
    "code": "HK"
  },
  {
    "id": 116,
    "name": "Hungary",
    "code": "HU"
  },
  {
    "id": 125,
    "name": "Iceland",
    "code": "IS"
  },
  {
    "id": 121,
    "name": "India",
    "code": "IN"
  },
  {
    "id": 117,
    "name": "Indonesia",
    "code": "ID"
  },
  {
    "id": 124,
    "name": "Iran",
    "code": "IR"
  },
  {
    "id": 123,
    "name": "Iraq",
    "code": "IQ"
  },
  {
    "id": 118,
    "name": "Ireland",
    "code": "IE"
  },
  {
    "id": 120,
    "name": "Isle of Man",
    "code": "IM"
  },
  {
    "id": 119,
    "name": "Israel",
    "code": "IL"
  },
  {
    "id": 126,
    "name": "Italy",
    "code": "IT"
  },
  {
    "id": 128,
    "name": "Jamaica",
    "code": "JM"
  },
  {
    "id": 130,
    "name": "Japan",
    "code": "JP"
  },
  {
    "id": 127,
    "name": "Jersey",
    "code": "JE"
  },
  {
    "id": 129,
    "name": "Jordan",
    "code": "JO"
  },
  {
    "id": 141,
    "name": "Kazakhstan",
    "code": "KZ"
  },
  {
    "id": 131,
    "name": "Kenya",
    "code": "KE"
  },
  {
    "id": 134,
    "name": "Kiribati",
    "code": "KI"
  },
  {
    "id": 139,
    "name": "Kuwait",
    "code": "KW"
  },
  {
    "id": 132,
    "name": "Kyrgyzstan",
    "code": "KG"
  },
  {
    "id": 142,
    "name": "Lao People's Democratic Republic",
    "code": "LA"
  },
  {
    "id": 151,
    "name": "Latvia",
    "code": "LV"
  },
  {
    "id": 143,
    "name": "Lebanon",
    "code": "LB"
  },
  {
    "id": 148,
    "name": "Lesotho",
    "code": "LS"
  },
  {
    "id": 147,
    "name": "Liberia",
    "code": "LR"
  },
  {
    "id": 152,
    "name": "Libya",
    "code": "LY"
  },
  {
    "id": 145,
    "name": "Liechtenstein",
    "code": "LI"
  },
  {
    "id": 149,
    "name": "Lithuania",
    "code": "LT"
  },
  {
    "id": 150,
    "name": "Luxembourg",
    "code": "LU"
  },
  {
    "id": 164,
    "name": "Macau",
    "code": "MO"
  },
  {
    "id": 160,
    "name": "Macedonia",
    "code": "MK"
  },
  {
    "id": 158,
    "name": "Madagascar",
    "code": "MG"
  },
  {
    "id": 172,
    "name": "Malawi",
    "code": "MW"
  },
  {
    "id": 174,
    "name": "Malaysia",
    "code": "MY"
  },
  {
    "id": 171,
    "name": "Maldives",
    "code": "MV"
  },
  {
    "id": 161,
    "name": "Mali",
    "code": "ML"
  },
  {
    "id": 169,
    "name": "Malta",
    "code": "MT"
  },
  {
    "id": 159,
    "name": "Marshall Islands",
    "code": "MH"
  },
  {
    "id": 166,
    "name": "Martinique",
    "code": "MQ"
  },
  {
    "id": 167,
    "name": "Mauritania",
    "code": "MR"
  },
  {
    "id": 170,
    "name": "Mauritius",
    "code": "MU"
  },
  {
    "id": 262,
    "name": "Mayotte",
    "code": "YT"
  },
  {
    "id": 173,
    "name": "Mexico",
    "code": "MX"
  },
  {
    "id": 89,
    "name": "Micronesia, Federated States of",
    "code": "FM"
  },
  {
    "id": 155,
    "name": "Moldova",
    "code": "MD"
  },
  {
    "id": 154,
    "name": "Monaco",
    "code": "MC"
  },
  {
    "id": 163,
    "name": "Mongolia",
    "code": "MN"
  },
  {
    "id": 156,
    "name": "Montenegro",
    "code": "ME"
  },
  {
    "id": 168,
    "name": "Montserrat",
    "code": "MS"
  },
  {
    "id": 153,
    "name": "Morocco",
    "code": "MA"
  },
  {
    "id": 175,
    "name": "Mozambique",
    "code": "MZ"
  },
  {
    "id": 162,
    "name": "Myanmar",
    "code": "MM"
  },
  {
    "id": 176,
    "name": "Namibia",
    "code": "NA"
  },
  {
    "id": 185,
    "name": "Nauru",
    "code": "NR"
  },
  {
    "id": 184,
    "name": "Nepal",
    "code": "NP"
  },
  {
    "id": 177,
    "name": "New Caledonia",
    "code": "NC"
  },
  {
    "id": 187,
    "name": "New Zealand",
    "code": "NZ"
  },
  {
    "id": 181,
    "name": "Nicaragua",
    "code": "NI"
  },
  {
    "id": 178,
    "name": "Niger",
    "code": "NE"
  },
  {
    "id": 180,
    "name": "Nigeria",
    "code": "NG"
  },
  {
    "id": 186,
    "name": "Niue",
    "code": "NU"
  },
  {
    "id": 179,
    "name": "Norfolk Island",
    "code": "NF"
  },
  {
    "id": 165,
    "name": "Northern Mariana Islands",
    "code": "MP"
  },
  {
    "id": 137,
    "name": "North Korea",
    "code": "KP"
  },
  {
    "id": 183,
    "name": "Norway",
    "code": "NO"
  },
  {
    "id": 188,
    "name": "Oman",
    "code": "OM"
  },
  {
    "id": 194,
    "name": "Pakistan",
    "code": "PK"
  },
  {
    "id": 201,
    "name": "Palau",
    "code": "PW"
  },
  {
    "id": 199,
    "name": "Palestine, State of",
    "code": "PS"
  },
  {
    "id": 189,
    "name": "Panama",
    "code": "PA"
  },
  {
    "id": 192,
    "name": "Papua New Guinea",
    "code": "PG"
  },
  {
    "id": 202,
    "name": "Paraguay",
    "code": "PY"
  },
  {
    "id": 190,
    "name": "Peru",
    "code": "PE"
  },
  {
    "id": 193,
    "name": "Philippines",
    "code": "PH"
  },
  {
    "id": 197,
    "name": "Pitcairn",
    "code": "PN"
  },
  {
    "id": 195,
    "name": "Poland",
    "code": "PL"
  },
  {
    "id": 200,
    "name": "Portugal",
    "code": "PT"
  },
  {
    "id": 198,
    "name": "Puerto Rico",
    "code": "PR"
  },
  {
    "id": 203,
    "name": "Qatar",
    "code": "QA"
  },
  {
    "id": 204,
    "name": "Réunion",
    "code": "RE"
  },
  {
    "id": 205,
    "name": "Romania",
    "code": "RO"
  },
  {
    "id": 207,
    "name": "Russian Federation",
    "code": "RU"
  },
  {
    "id": 208,
    "name": "Rwanda",
    "code": "RW"
  },
  {
    "id": 42,
    "name": "Saint Barthélemy",
    "code": "BL"
  },
  {
    "id": 215,
    "name": "Saint Helena",
    "code": "SH"
  },
  {
    "id": 136,
    "name": "Saint Kitts and Nevis",
    "code": "KN"
  },
  {
    "id": 144,
    "name": "Saint Lucia",
    "code": "LC"
  },
  {
    "id": 157,
    "name": "Saint-Martin (France)",
    "code": "MF"
  },
  {
    "id": 253,
    "name": "Saint Vincent and the Grenadines",
    "code": "VC"
  },
  {
    "id": 260,
    "name": "Samoa",
    "code": "WS"
  },
  {
    "id": 220,
    "name": "San Marino",
    "code": "SM"
  },
  {
    "id": 225,
    "name": "Sao Tome and Principe",
    "code": "ST"
  },
  {
    "id": 209,
    "name": "Saudi Arabia",
    "code": "SA"
  },
  {
    "id": 221,
    "name": "Senegal",
    "code": "SN"
  },
  {
    "id": 206,
    "name": "Serbia",
    "code": "RS"
  },
  {
    "id": 211,
    "name": "Seychelles",
    "code": "SC"
  },
  {
    "id": 219,
    "name": "Sierra Leone",
    "code": "SL"
  },
  {
    "id": 214,
    "name": "Singapore",
    "code": "SG"
  },
  {
    "id": 227,
    "name": "Sint Maarten (Dutch part)",
    "code": "SX"
  },
  {
    "id": 218,
    "name": "Slovakia",
    "code": "SK"
  },
  {
    "id": 216,
    "name": "Slovenia",
    "code": "SI"
  },
  {
    "id": 210,
    "name": "Solomon Islands",
    "code": "SB"
  },
  {
    "id": 222,
    "name": "Somalia",
    "code": "SO"
  },
  {
    "id": 263,
    "name": "South Africa",
    "code": "ZA"
  },
  {
    "id": 106,
    "name": "South Georgia and the South Sandwich Islands",
    "code": "GS"
  },
  {
    "id": 138,
    "name": "South Korea",
    "code": "KR"
  },
  {
    "id": 224,
    "name": "South Sudan",
    "code": "SS"
  },
  {
    "id": 84,
    "name": "Spain",
    "code": "ES"
  },
  {
    "id": 146,
    "name": "Sri Lanka",
    "code": "LK"
  },
  {
    "id": 196,
    "name": "St. Pierre and Miquelon",
    "code": "PM"
  },
  {
    "id": 212,
    "name": "Sudan",
    "code": "SD"
  },
  {
    "id": 223,
    "name": "Suriname",
    "code": "SR"
  },
  {
    "id": 217,
    "name": "Svalbard and Jan Mayen Islands",
    "code": "SJ"
  },
  {
    "id": 229,
    "name": "Swaziland",
    "code": "SZ"
  },
  {
    "id": 213,
    "name": "Sweden",
    "code": "SE"
  },
  {
    "id": 59,
    "name": "Switzerland",
    "code": "CH"
  },
  {
    "id": 228,
    "name": "Syria",
    "code": "SY"
  },
  {
    "id": 244,
    "name": "Taiwan",
    "code": "TW"
  },
  {
    "id": 235,
    "name": "Tajikistan",
    "code": "TJ"
  },
  {
    "id": 245,
    "name": "Tanzania",
    "code": "TZ"
  },
  {
    "id": 234,
    "name": "Thailand",
    "code": "TH"
  },
  {
    "id": 182,
    "name": "The Netherlands",
    "code": "NL"
  },
  {
    "id": 237,
    "name": "Timor-Leste",
    "code": "TL"
  },
  {
    "id": 233,
    "name": "Togo",
    "code": "TG"
  },
  {
    "id": 236,
    "name": "Tokelau",
    "code": "TK"
  },
  {
    "id": 240,
    "name": "Tonga",
    "code": "TO"
  },
  {
    "id": 242,
    "name": "Trinidad and Tobago",
    "code": "TT"
  },
  {
    "id": 239,
    "name": "Tunisia",
    "code": "TN"
  },
  {
    "id": 241,
    "name": "Turkey",
    "code": "TR"
  },
  {
    "id": 238,
    "name": "Turkmenistan",
    "code": "TM"
  },
  {
    "id": 230,
    "name": "Turks and Caicos Islands",
    "code": "TC"
  },
  {
    "id": 243,
    "name": "Tuvalu",
    "code": "TV"
  },
  {
    "id": 247,
    "name": "Uganda",
    "code": "UG"
  },
  {
    "id": 246,
    "name": "Ukraine",
    "code": "UA"
  },
  {
    "id": 18,
    "name": "United Arab Emirates",
    "code": "AE"
  },
  {
    "id": 93,
    "name": "United Kingdom",
    "code": "GB"
  },
  {
    "id": 249,
    "name": "United States",
    "code": "US"
  },
  {
    "id": 248,
    "name": "United States Minor Outlying Islands",
    "code": "UM"
  },
  {
    "id": 250,
    "name": "Uruguay",
    "code": "UY"
  },
  {
    "id": 251,
    "name": "Uzbekistan",
    "code": "UZ"
  },
  {
    "id": 258,
    "name": "Vanuatu",
    "code": "VU"
  },
  {
    "id": 252,
    "name": "Vatican",
    "code": "VA"
  },
  {
    "id": 254,
    "name": "Venezuela",
    "code": "VE"
  },
  {
    "id": 257,
    "name": "Vietnam",
    "code": "VN"
  },
  {
    "id": 255,
    "name": "Virgin Islands (British)",
    "code": "VG"
  },
  {
    "id": 256,
    "name": "Virgin Islands (U.S.)",
    "code": "VI"
  },
  {
    "id": 259,
    "name": "Wallis and Futuna Islands",
    "code": "WF"
  },
  {
    "id": 82,
    "name": "Western Sahara",
    "code": "EH"
  },
  {
    "id": 261,
    "name": "Yemen",
    "code": "YE"
  },
  {
    "id": 264,
    "name": "Zambia",
    "code": "ZM"
  },
  {
    "id": 265,
    "name": "Zimbabwe",
    "code": "ZW"
  }
]
```

#### /countries
> GET

&nbsp;

###### Example
```php
<?php

use UCRM\REST\Endpoints\Version;

$version = Version::get()->first();

echo $version;
```

&nbsp;

###### Output
```json
{"version":"2.13.0-beta2"}
```
