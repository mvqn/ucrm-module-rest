# Version


**GET**
- [Version](#version)


&nbsp;
## Version
```
GET /version
```

#### Example
```php
<?php

use UCRM\REST\Endpoints\Version;

$version = Version::get()->first();

echo $version;
```

#### Output
```json
{"version":"2.13.0-beta2"}
```
